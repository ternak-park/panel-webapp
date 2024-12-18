<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kesehatan;
use App\Models\Program;
use App\Models\Status;
use App\Models\TernakKandang;
use App\Models\Tipe;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TernakHewan;
use App\Exports\HewanExport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class HewanController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['main'] = 'Hewan';
        $data['judul'] = 'Manajemen Hewan';
        $data['sub_judul'] = 'Data Hewan';
        $data['hewan'] = TernakHewan::all();
        $data['status'] = Status::all();
        $data['tipe'] = Tipe::all();
        $data['kesehatan'] = Kesehatan::all();
        $data['program'] = Program::all();
        $data['kandang'] = TernakKandang::all();
        $data['user'] = User::all();


        if ($request->ajax()) {
            $hewan = TernakHewan::with('tipe:id,nama_tipe')
                ->select('id', 'tag', 'jenis', 'sex', 'ternak_tipe', 'gambar_hewan');
            return Datatables::of($hewan)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.hewan.action', ['id' => $row->id])->render();
                })
                ->editColumn('ternak_tipe', function ($row) {
                    return $row->tipe->nama_tipe ?? 'Tidak tersedia';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // Hitung jumlah hewan berdasarkan sex
        $tracker = TernakHewan::select('sex', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('sex')
            ->get();

        // Hitung total hewan untuk persentase
        $total = $tracker->sum('jumlah');

        // Tambahkan data tracker dan total ke variabel
        $data['tracker'] = $tracker;
        $data['total'] = $total;

        return view('admin.hewan.index', $data);
    }



    public function show($id)
    {
        $ternakHewan = TernakHewan::with([
            'status',
            'kesehatan',
            'program',
            'kandang',
            'pemilik'
        ])
            ->where('id', $id)
            ->firstOrFail();


        return view('admin.hewan.show', compact('ternakHewan'));
    }


    public function downloadGambar($namafile)
    {
        $path = storage_path("app/public/hewan/{$namafile}");
        if (!file_exists($path)) {
            abort(404, "File not found");
        }
        return response()->download($path, $namafile);
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'ternak_tag' => 'required|string|max:255',
            'ternak_induk' => 'nullable|string|max:255',
            'sex' => 'required|in:Jantan,Betina',
            'tanggal_masuk' => 'required|date',
            'ternak_status_indeks' => 'nullable|numeric|exists:ternak_hewan,id',
            'ternak_tipe_indeks' => 'nullable|numeric|exists:ternak_hewan,id',
            'ternak_kesehatan_indeks' => 'nullable|numeric|exists:ternak_hewan,id',
            'ternak_program_indeks' => 'nullable|numeric|exists:ternak_hewan,id',
            'ternak_kandang_indeks' => 'nullable|numeric|exists:ternak_hewan,id',
            'pemilik_indeks' => 'nullable|numeric|exists:ternak_hewan,id',
        ], [
            'ternak_tag.required' => 'Tag ternak harus diisi.',
            'sex.required' => 'Jenis kelamin ternak harus dipilih.',
            'sex.in' => 'Jenis kelamin harus salah satu dari Jantan atau Betina.',
            'tanggal_masuk.required' => 'Tanggal masuk harus diisi.',
            'ternak_status_indeks.exists' => 'Status ternak yang dipilih tidak valid.',
            'ternak_tipe_indeks.exists' => 'Tipe ternak yang dipilih tidak valid.',
            'ternak_kesehatan_indeks.exists' => 'Kesehatan ternak yang dipilih tidak valid.',
            'ternak_program_indeks.exists' => 'Program ternak yang dipilih tidak valid.',
            'ternak_kandang_indeks.exists' => 'Kandang ternak yang dipilih tidak valid.',
            'pemilik_indeks.exists' => 'Pemilik ternak yang dipilih tidak valid.',
        ]);

        if ($validator->fails()) {
            // Redirect kembali dengan error SweetAlert
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::transaction(function () use ($request) {
            if ($request->hasFile('gambar_hewan')) {
                $gambar = $request->file('gambar_hewan');
                $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
                $gambar->storeAs('public/hewan', $gambarName);
            } else {
                $gambarName = null;
            }

            // Insert ke tabel ternak_hewan
            $hewanId = DB::table('ternak_hewan')->insertGetId([
                'tag' => $request->ternak_tag,
                'jenis' => 'Domba',
                'sex' => $request->sex,
                'ternak_tipe' => $request->ternak_tipe_indeks,
                'gambar_hewan' => $gambarName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Insert ke tabel ternak_detail menggunakan ID dari ternak_hewan
            DB::table('ternak_detail')->insert([
                'ternak_tag' => $request->ternak_tag,
                'ternak_induk' => $request->ternak_induk ?? NULL,
                'sex' => $request->sex,
                'tanggal_masuk' => $request->tanggal_masuk,
                'ternak_status' => $request->ternak_status_indeks,
                'ternak_tipe' => $request->ternak_tipe_indeks,
                'ternak_kesehatan' => $request->ternak_kesehatan_indeks,
                'ternak_program' => $request->ternak_program_indeks,
                'ternak_kandang' => $request->ternak_kandang_indeks,
                'pemilik' => $request->pemilik_indeks,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            // dd($request);
        });

        // Redirect ke daftar hewan dengan pesan sukses
        return redirect()->route('hewan.index')
            ->with('success', 'Data Hewan berhasil ditambahkan.');
    }
    public function create()
    {
        // Ambil data yang dibutuhkan dari database
        //     $statusTernak = Status::all();
        //     $tipeTernak = Tipe::all();
        //     $kesehatanTernak = Kesehatan::all();
        //     $programTernak = Program::all();
        //     $kandangTernak = TernakKandang::all();
        //     $pemilikTernak = User::all();

        //     return view('admin.hewan.create', compact('statusTernak', 'tipeTernak', 'kesehatanTernak', 'programTernak', 'kandangTernak', 'pemilikTernak'));
    }

    public function edit($id)
    {
        // Fetch the animal data with all related details
        $hewan = TernakHewan::with([
            'detail',  // Assuming you have a relationship defined
            'status',
            'tipe',
            'kesehatan',
            'program',
            'kandang',
            'pemilik'
        ])->findOrFail($id);

        return response()->json($hewan);
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'ternak_tag' => 'required|string|max:255',
            'ternak_induk' => 'nullable|string|max:255',
            'sex' => 'required|in:Jantan,Betina',
            'tanggal_masuk' => 'required|date',
            'ternak_status_indeks' => 'nullable|numeric|exists:ternak_hewan,id',
            'ternak_tipe_indeks' => 'nullable|numeric|exists:ternak_hewan,id',
            'ternak_kesehatan_indeks' => 'nullable|numeric|exists:ternak_hewan,id',
            'ternak_program_indeks' => 'nullable|numeric|exists:ternak_hewan,id',
            'ternak_kandang_indeks' => 'nullable|numeric|exists:ternak_hewan,id',
            'pemilik_indeks' => 'nullable|numeric|exists:ternak_hewan,id',
        ], [
            'ternak_tag.required' => 'Tag ternak harus diisi.',
            'sex.required' => 'Jenis kelamin ternak harus dipilih.',
            'sex.in' => 'Jenis kelamin harus salah satu dari Jantan atau Betina.',
            'tanggal_masuk.required' => 'Tanggal masuk harus diisi.',
            'ternak_status_indeks.exists' => 'Status ternak yang dipilih tidak valid.',
            'ternak_tipe_indeks.exists' => 'Tipe ternak yang dipilih tidak valid.',
            'ternak_kesehatan_indeks.exists' => 'Kesehatan ternak yang dipilih tidak valid.',
            'ternak_program_indeks.exists' => 'Program ternak yang dipilih tidak valid.',
            'ternak_kandang_indeks.exists' => 'Kandang ternak yang dipilih tidak valid.',
            'pemilik_indeks.exists' => 'Pemilik ternak yang dipilih tidak valid.',
        ]);

        $isAjax = $request->ajax();

        if ($validator->fails()) {
            if ($isAjax) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::transaction(function () use ($request, $id) {
                // Update logic remains the same
                DB::table('ternak_hewan')->where('id', $id)->update([
                    'tag' => $request->ternak_tag,
                    'jenis' => 'Domba',
                    'sex' => $request->sex,
                    'ternak_tipe' => $request->ternak_tipe_indeks,
                    'updated_at' => now(),
                ]);

                DB::table('ternak_detail')->where('ternak_tag', $request->ternak_tag)->update([
                    'ternak_induk' => $request->ternak_induk ?? NULL,
                    'sex' => $request->sex,
                    'tanggal_masuk' => $request->tanggal_masuk,
                    'ternak_status' => $request->ternak_status_indeks,
                    'ternak_tipe' => $request->ternak_tipe_indeks,
                    'ternak_kesehatan' => $request->ternak_kesehatan_indeks,
                    'ternak_program' => $request->ternak_program_indeks,
                    'ternak_kandang' => $request->ternak_kandang_indeks,
                    'pemilik' => $request->pemilik_indeks,
                    'updated_at' => now(),
                ]);
            });

            // Different response for AJAX and non-AJAX requests
            if ($isAjax) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Hewan berhasil diperbarui.'
                ]);
            }

            return redirect()->route('hewan.index')
                ->with('success', 'Data Hewan berhasil diperbarui.');
        } catch (\Exception $e) {
            if ($isAjax) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function getData($id)
    {
        // Fetch basic animal data
        $hewan = TernakHewan::findOrFail($id);
        return response()->json($hewan);
    }

    public function getDetailData($id)
    {
        // Fetch detailed animal data from ternak_detail
        $hewanDetail = DB::table('ternak_detail')
            ->where('ternak_tag', function ($query) use ($id) {
                $query->select('tag')
                    ->from('ternak_hewan')
                    ->where('id', $id);
            })
            ->first();

        return response()->json($hewanDetail);
    }

    public function destroy($id)
    {
        $hewan = TernakHewan::findOrFail($id);
        $hewan->delete();

        return response()->json(['success' => 'Data telah dihapus.']);
    }

    // gawe export excel
    public function excel()
    {
        return Excel::download(new HewanExport, 'hewan.xlsx');
    }
}

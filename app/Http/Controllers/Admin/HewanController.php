<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\HewanImport;
use App\Models\Kesehatan;
use App\Models\Program;
use App\Models\Status;
use App\Models\TernakKandang;
use App\Models\User;
use App\Models\Jenis;
use App\Models\DetailTernakHewan;
use App\Models\TernakFisik;
use Illuminate\Http\Request;
use App\Models\TernakHewan;
use App\Exports\HewanExport;
use Maatwebsite\Excel\Facades\Excel;
use Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


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
    
    // Tidak menggunakan Tipe model karena tidak ada
    $data['tipe'] = collect([]);
    
    $data['kesehatan'] = Kesehatan::all();
    $data['program'] = Program::all();
    $data['kandang'] = TernakKandang::all();
    $data['induk'] = TernakHewan::where('sex_hewan', 'Betina')
        ->get();

    $data['user'] = User::all();
    $data['jenis'] = Jenis::all();
    $data['jenisTernak'] = Jenis::all();

    if ($request->ajax()) {
        // Start with TernakHewan query
        $query = TernakHewan::select([
            'ternak_hewan.id',
            'ternak_hewan.tag_hewan',
            'ternak_hewan.sex_hewan',
            'ternak_hewan.ternak_jenis_id',
            'ternak_hewan.gambar_hewan'
        ]);
        
        // Add joins for related tables - using correct column names and aliases
        if (Schema::hasTable('jenis')) {
            $query->leftJoin('jenis', 'ternak_hewan.ternak_jenis_id', '=', 'jenis.id')
                  ->addSelect('jenis.nama_jenis');
        }
        
        // Join DetailTernakHewan using ID instead of tag_hewan
        $query->leftJoin('ternak_detail_hewan', 'ternak_hewan.id', '=', 'ternak_detail_hewan.ternak_tag');
        
        if (Schema::hasTable('program')) {
            $query->leftJoin('program', 'ternak_detail_hewan.ternak_program', '=', 'program.id')
                  ->addSelect('program.nama_program');
        }
        
        if (Schema::hasTable('status')) {
            $query->leftJoin('status', 'ternak_detail_hewan.ternak_status', '=', 'status.id')
                  ->addSelect('status.nama_status');
        }
        
        return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return view('admin.hewan.action', ['id' => $row->id])->render();
            })
            ->addColumn('program', function ($row) {
                return $row->nama_program ?? 'Tidak tersedia';
            })
            ->addColumn('jenis', function ($row) {
                return $row->nama_jenis ?? 'Tidak tersedia';
            })
            ->addColumn('status', function ($row) {
                return $row->nama_status ?? 'Tidak tersedia';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    // Rest of the code remains the same
    $tracker = TernakHewan::select('sex_hewan', DB::raw('COUNT(*) as jumlah'))
        ->groupBy('sex_hewan')
        ->get();

    $total = $tracker->sum('jumlah');

    $data['tracker'] = $tracker;
    $data['total'] = $total;

    return view('admin.hewan.index', $data);
}



    public function show($id)
    {
        // Find TernakHewan by ID and eagerly load all related data
        $ternakHewan = TernakHewan::with([
            'detailTernakHewans.program',
            'detailTernakHewans.jenis',
            'detailTernakHewans.status',
            'detailTernakHewans.kesehatan',
            'detailTernakHewans.ternakKandang',
            'detailTernakHewans.pemilik',
            'detailTernakHewans.ternakFisik',
            'jenis'
        ])->findOrFail($id);

        // Return view with the data
        return view('admin.hewan.show', compact('ternakHewan'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'ternak_tag' => 'required|string|max:255',
            'sex_hewan' => 'required|in:Jantan,Betina',
            'tanggal_masuk' => 'required|date',
            'ternak_jenis_indeks' => 'nullable|numeric|exists:jenis,id',
            'ternak_status_indeks' => 'nullable|numeric|exists:status,id',
            'ternak_kesehatan_indeks' => 'nullable|numeric|exists:kesehatan,id',
            'ternak_program_indeks' => 'nullable|numeric|exists:program,id',
            'ternak_kandang_indeks' => 'nullable|numeric|exists:ternak_kandang,id',
            'pemilik_indeks' => 'nullable|numeric|exists:users,id',
            'gambar_hewan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tag_induk_betina' => 'nullable|string|max:255',
            'tag_induk_jantan' => 'nullable|string|max:255',
            'tag_anak' => 'nullable|string|max:255',
            'ternak_usia' => 'nullable|string',
            'lama_hari_dipeternakan' => 'nullable|numeric',
            'tgl_terjual_mati' => 'nullable|date',
            'bb_masuk_lahir' => 'nullable|numeric',
            'bb_terbaru' => 'nullable|numeric',
            'tgl_timbang_terbaru' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::transaction(function () use ($request) {
                // Handle image upload if provided
                if ($request->hasFile('gambar_hewan')) {
                    $gambar = $request->file('gambar_hewan');
                    $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
                    $gambar->storeAs('public/hewan', $gambarName);
                } else {
                    $gambarName = null;
                }

                // First, create TernakHewan record
                $ternakHewan = new TernakHewan();
                $ternakHewan->tag_hewan = $request->ternak_tag;
                $ternakHewan->sex_hewan = $request->sex_hewan;
                $ternakHewan->ternak_jenis_id = $request->ternak_jenis_indeks;
                $ternakHewan->gambar_hewan = $gambarName;
                $ternakHewan->save();

                // Now use the ID of the newly created TernakHewan record for ternak_tag in DetailTernakHewan
                $detail = new DetailTernakHewan();
                $detail->ternak_tag = $ternakHewan->id; // Use ID instead of tag_hewan
                $detail->tag_induk_betina = $request->tag_induk_betina;
                $detail->tag_induk_jantan = $request->tag_induk_jantan;
                $detail->tag_anak = $request->tag_anak;
                $detail->ternak_kandang = $request->ternak_kandang_indeks;
                $detail->nama_pemilik = $request->pemilik_indeks;
                $detail->tanggal_masuk = $request->tanggal_masuk;
                $detail->ternak_sex = $request->sex_hewan;
                $detail->ternak_jenis = $request->ternak_jenis_indeks;
                $detail->ternak_kesehatan = $request->ternak_kesehatan_indeks;
                $detail->ternak_program = $request->ternak_program_indeks;
                $detail->ternak_status = $request->ternak_status_indeks;
                $detail->ternak_usia = $request->ternak_usia ?? '0';
                $detail->lama_hari_dipeternakan = $request->lama_hari_dipeternakan ?? 0;
                $detail->tgl_terjual_mati = $request->tgl_terjual_mati;
                $detail->ternak_fisik = $request->ternak_fisik ?? 1; // This is required by your schema, so set a default
                $detail->bb_masuk_lahir = $request->bb_masuk_lahir ?? 0;
                $detail->bb_terbaru = $request->bb_terbaru ?? 0;
                $detail->tgl_timbang_terbaru = $request->tgl_timbang_terbaru ?? now();
                $detail->save();
            });

            return redirect()->route('hewan.index')
                ->with('success', 'Data Hewan berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        // Similar validation as store method
        $validator = Validator::make($request->all(), [
            'ternak_tag' => 'required|string|max:255',
            'sex_hewan' => 'required|in:Jantan,Betina',
            'tanggal_masuk' => 'required|date',
            'ternak_jenis_indeks' => 'nullable|numeric|exists:jenis,id',
            'ternak_status_indeks' => 'nullable|numeric|exists:status,id',
            'ternak_kesehatan_indeks' => 'nullable|numeric|exists:kesehatan,id',
            'ternak_program_indeks' => 'nullable|numeric|exists:program,id',
            'ternak_kandang_indeks' => 'nullable|numeric|exists:ternak_kandang,id',
            'pemilik_indeks' => 'nullable|numeric|exists:users,id',
            'gambar_hewan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tag_induk_betina' => 'nullable|string|max:255',
            'tag_induk_jantan' => 'nullable|string|max:255',
            'tag_anak' => 'nullable|string|max:255',
            'ternak_usia' => 'nullable|string',
            'lama_hari_dipeternakan' => 'nullable|numeric',
            'tgl_terjual_mati' => 'nullable|date',
            'bb_masuk_lahir' => 'nullable|numeric',
            'bb_terbaru' => 'nullable|numeric',
            'tgl_timbang_terbaru' => 'nullable|date',
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
                // Find the TernakHewan record
                $ternakHewan = TernakHewan::findOrFail($id);
                $oldTagHewan = $ternakHewan->tag_hewan;

                // Handle image upload if provided
                if ($request->hasFile('gambar_hewan')) {
                    // Delete old image if it exists
                    if ($ternakHewan->gambar_hewan) {
                        Storage::delete('public/hewan/' . $ternakHewan->gambar_hewan);
                    }

                    // Upload new image
                    $gambar = $request->file('gambar_hewan');
                    $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
                    $gambar->storeAs('public/hewan', $gambarName);
                    $ternakHewan->gambar_hewan = $gambarName;
                }

                // Update TernakHewan record
                $ternakHewan->tag_hewan = $request->ternak_tag;
                $ternakHewan->sex_hewan = $request->sex_hewan;
                $ternakHewan->ternak_jenis_id = $request->ternak_jenis_indeks;
                $ternakHewan->save();

                // Find or create DetailTernakHewan record using the TernakHewan ID
                $detail = DetailTernakHewan::firstOrNew(['ternak_tag' => $ternakHewan->id]);

                // Update DetailTernakHewan record
                $detail->tag_induk_betina = $request->tag_induk_betina;
                $detail->tag_induk_jantan = $request->tag_induk_jantan;
                $detail->tag_anak = $request->tag_anak;
                $detail->ternak_kandang = $request->ternak_kandang_indeks;
                $detail->nama_pemilik = $request->pemilik_indeks;
                $detail->tanggal_masuk = $request->tanggal_masuk;
                $detail->ternak_sex = $request->sex_hewan;
                $detail->ternak_jenis = $request->ternak_jenis_indeks;
                $detail->ternak_kesehatan = $request->ternak_kesehatan_indeks;
                $detail->ternak_program = $request->ternak_program_indeks;
                $detail->ternak_status = $request->ternak_status_indeks;

                // Update the rest of the fields if they are provided
                if ($request->filled('ternak_usia')) {
                    $detail->ternak_usia = $request->ternak_usia;
                }

                if ($request->filled('lama_hari_dipeternakan')) {
                    $detail->lama_hari_dipeternakan = $request->lama_hari_dipeternakan;
                }

                if ($request->filled('tgl_terjual_mati')) {
                    $detail->tgl_terjual_mati = $request->tgl_terjual_mati;
                }

                if ($request->filled('bb_masuk_lahir')) {
                    $detail->bb_masuk_lahir = $request->bb_masuk_lahir;
                }

                if ($request->filled('bb_terbaru')) {
                    $detail->bb_terbaru = $request->bb_terbaru;
                }

                if ($request->filled('tgl_timbang_terbaru')) {
                    $detail->tgl_timbang_terbaru = $request->tgl_timbang_terbaru;
                }

                // Set ternak_fisik if it's required
                if (!$detail->ternak_fisik) {
                    $detail->ternak_fisik = 1; // Default value
                }

                $detail->save();
            });

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
                ->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        // Find TernakHewan by ID
        $ternakHewan = TernakHewan::with('detailTernakHewans')->findOrFail($id);

        // Prepare response data - without ternak_tipe since it doesn't exist
        $response = [
            'id' => $ternakHewan->id,
            'tag_hewan' => $ternakHewan->tag_hewan,
            'sex_hewan' => $ternakHewan->sex_hewan,
            'ternak_jenis_id' => $ternakHewan->ternak_jenis_id,
            'gambar_hewan' => $ternakHewan->gambar_hewan
        ];

        // Add detail data if available
        $detail = $ternakHewan->detailTernakHewans->first();
        if ($detail) {
            $response['detail'] = [
                'ternak_tag' => $detail->ternak_tag,
                'tag_induk_betina' => $detail->tag_induk_betina,
                'tag_induk_jantan' => $detail->tag_induk_jantan,
                'tag_anak' => $detail->tag_anak,
                'ternak_kandang' => $detail->ternak_kandang,
                'nama_pemilik' => $detail->nama_pemilik,
                'tanggal_masuk' => $detail->tanggal_masuk,
                'ternak_sex' => $detail->ternak_sex,
                'ternak_jenis' => $detail->ternak_jenis,
                'ternak_kesehatan' => $detail->ternak_kesehatan,
                'ternak_program' => $detail->ternak_program,
                'ternak_status' => $detail->ternak_status,
                'ternak_usia' => $detail->ternak_usia,
                'lama_hari_dipeternakan' => $detail->lama_hari_dipeternakan,
                'tgl_terjual_mati' => $detail->tgl_terjual_mati,
                'ternak_fisik' => $detail->ternak_fisik,
                'bb_masuk_lahir' => $detail->bb_masuk_lahir,
                'bb_terbaru' => $detail->bb_terbaru,
                'tgl_timbang_terbaru' => $detail->tgl_timbang_terbaru
            ];

            // Add ternak_tipe only if the column exists in the DetailTernakHewan table
            if (Schema::hasColumn('ternak_detail_hewan', 'ternak_tipe')) {
                $response['detail']['ternak_tipe'] = $detail->ternak_tipe;
            }
        }

        return response()->json($response);
    }
    public function destroy($id)
    {
        try {
            // Find the TernakHewan record
            $ternakHewan = TernakHewan::findOrFail($id);

            // Delete related DetailTernakHewan records using the correct ID reference
            DetailTernakHewan::where('ternak_tag', $ternakHewan->id)->delete();

            // Delete image if exists
            if ($ternakHewan->gambar_hewan) {
                Storage::delete('public/hewan/' . $ternakHewan->gambar_hewan);
            }

            // Delete TernakHewan record
            $ternakHewan->delete();

            return response()->json(['success' => 'Data telah dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
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

    // public function edit($id)
    // {
    //     $hewan = TernakHewan::findOrFail($id);

    //     // Get detail data manually
    //     $detail = null;

    //     // Periksa apakah tabel ternak_detail ada
    //     if (Schema::hasTable('ternak_detail')) {
    //         $detail = DB::table('ternak_detail')->where('ternak_tag', $hewan->tag)->first();
    //     }

    //     // Create a response object with the necessary data
    //     $response = [
    //         'id' => $hewan->id,
    //         'tag' => $hewan->tag,
    //         'jenis' => $hewan->jenis,
    //         'sex_hewan' => $hewan->sex_hewan,
    //         'ternak_tipe' => $hewan->ternak_tipe,
    //         'detail' => $detail
    //     ];

    //     return response()->json($response);
    // }

    public function getData($id)
    {
        // Fetch basic animal data
        $hewan = TernakHewan::findOrFail($id);
        return response()->json($hewan);
    }

    public function getDetailData($id)
    {
        // Periksa apakah tabel ternak_detail ada
        if (!Schema::hasTable('ternak_detail')) {
            return response()->json(null);
        }

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


    // gawe export excel
    public function excel()
    {
        return Excel::download(new HewanExport, 'hewan.xlsx');
    }

    public function batchDelete(Request $request)
    {
        try {
            $ids = $request->ids;

            // Get TernakHewan records
            $ternakHewans = TernakHewan::whereIn('id', $ids)->get();

            foreach ($ternakHewans as $hewan) {
                // Delete related DetailTernakHewan records using the correct ID reference
                DetailTernakHewan::where('ternak_tag', $hewan->id)->delete();

                // Delete image if exists
                if ($hewan->gambar_hewan) {
                    Storage::delete('public/hewan/' . $hewan->gambar_hewan);
                }
            }

            // Delete TernakHewan records
            TernakHewan::whereIn('id', $ids)->delete();

            return response()->json(['success' => 'Data berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /* import csv */
    // Method untuk import CSV
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt,xlsx,xls|max:2048',
        ], [
            'file.required' => 'File CSV harus diupload.',
            'file.file' => 'Upload harus berupa file.',
            'file.mimes' => 'Format file harus CSV, TXT, XLSX, atau XLS.',
            'file.max' => 'Ukuran file maksimal 2MB.',
        ]);

        try {
            Excel::import(new HewanImport, $request->file('file'));

            return redirect()->route('hewan.index')
                ->with('success', 'Data berhasil diimport.');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $errors = [];

            foreach ($failures as $failure) {
                $errors[] = 'Baris ' . $failure->row() . ': ' . implode(', ', $failure->errors());
            }

            return redirect()->route('hewan.index')
                ->with('error', 'Gagal import data: ' . implode('<br>', $errors));
        } catch (\Exception $e) {
            return redirect()->route('hewan.index')
                ->with('error', 'Gagal import data: ' . $e->getMessage());
        }
    }

    // Method gawe download file csv
    public function template()
    {
        // Fetch data for dropdown lists
        $statusList = Status::pluck('nama_status')->toArray();
        $kesehatanList = Kesehatan::pluck('nama_kesehatan')->toArray();
        $programList = Program::pluck('nama_program')->toArray();
        $kandangList = TernakKandang::pluck('kode_kandang')->toArray();
        $jenisList = Jenis::pluck('nama_jenis')->toArray();
        $pemilikList = User::pluck('name')->toArray();

        // Get sample IDs for examples
        $statusId = Status::first()->id ?? 1;
        $kesehatanId = Kesehatan::first()->id ?? 1;
        $programId = Program::first()->id ?? 1;
        $kandangId = TernakKandang::first()->id ?? 1;
        $jenisId = Jenis::first()->id ?? 1;
        $pemilikId = User::first()->id ?? 1;

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="template_import_hewan.csv"',
        ];

        $callback = function () use ($statusList, $kesehatanList, $programList, $kandangList, $jenisList, $pemilikList, $statusId, $kesehatanId, $programId, $kandangId, $jenisId, $pemilikId) {
            $file = fopen('php://output', 'w');

            // CSV headers matching the field names expected by HewanImport
            fputcsv($file, [
                'tag',
                'sex_hewan',
                'jenis',
                'ternak_induk_betina',
                'ternak_induk_jantan',
                'tag_anak',
                'kandang',
                'pemilik',
                'tanggal_masuk',
                'status',
                'kesehatan',
                'program',
                'ternak_usia',
                'lama_hari_dipeternakan',
                'tgl_terjual_mati',
                'bb_masuk_lahir',
                'bb_terbaru',
                'tgl_timbang_terbaru'
            ]);

            // Example row using names
            fputcsv($file, [
                'TAG001',
                'Jantan',
                $jenisList[0] ?? 'Domba',
                '', // ternak induk betina
                '', // ternak induk jantan
                '', // tag anak
                $kandangList[0] ?? '',
                $pemilikList[0] ?? 'Admin',
                date('Y-m-d'),
                $statusList[0] ?? '',
                $kesehatanList[0] ?? '',
                $programList[0] ?? '',
                '3', // Usia dalam bulan
                '0', // Lama hari
                '', // tanggal terjual/mati (kosong)
                '10.5', // BB masuk
                '15.2', // BB terbaru
                date('Y-m-d') // Tanggal timbang
            ]);

            // Example row using IDs
            fputcsv($file, [
                'TAG002',
                'Betina',
                $jenisId,
                'TAG001', // ternak induk betina
                '', // ternak induk jantan
                '', // tag anak
                $kandangId,
                $pemilikId,
                date('d/m/Y'),
                $statusId,
                $kesehatanId,
                $programId,
                '5', // Usia
                '30', // Lama hari
                '', // tanggal terjual/mati (kosong)
                '12.3', // BB masuk
                '18.7', // BB terbaru
                date('Y-m-d') // Tanggal timbang
            ]);

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}

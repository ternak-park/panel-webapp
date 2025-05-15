<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\KandangImport;
use App\Models\DetailTernakKandang;
use App\Models\Petugas;
use App\Models\Pemilik;
use App\Models\TernakHewan;
use Illuminate\Http\Request;
use App\Models\TernakKandang;
use App\Exports\KandangExport;
use Maatwebsite\Excel\Facades\Excel;
use Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class KandangController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['main'] = 'Kandang';
        $data['judul'] = 'Manajemen Kandang';
        $data['sub_judul'] = 'Data Kandang';
        $data['kandang'] = TernakKandang::all();
        $data['pemilik'] = Pemilik::all();
        $data['petugas'] = Petugas::all();

        if ($request->ajax()) {
            // Query kandang dengan join ke detail_kandang
            $query = TernakKandang::select([
                'ternak_kandang.id',
                'ternak_kandang.kode_kandang',
                'ternak_kandang.total_ternak_kandang',
                'ternak_kandang.nama_pemilik_id',
            ]);

            // Join with detail_kandang to get additional info
            if (Schema::hasTable('ternak_detail_kandang')) {
                $query->leftJoin('ternak_detail_kandang', 'ternak_kandang.id', '=', 'ternak_detail_kandang.kode_kandang_id')
                    ->addSelect([
                        'ternak_detail_kandang.total_ternak',
                        'ternak_detail_kandang.total_bb',
                        'ternak_detail_kandang.nama_petugas_id',
                    ]);
            }

            // Join with pemilik table
            if (Schema::hasTable('pemilik')) {
                $query->leftJoin('pemilik', 'ternak_kandang.nama_pemilik_id', '=', 'pemilik.id')
                    ->addSelect('pemilik.nama_pemilik');
            }

            // Join with petugas table
            if (Schema::hasTable('petugas')) {
                $query->leftJoin('petugas', 'ternak_detail_kandang.nama_petugas_id', '=', 'petugas.id')
                    ->addSelect('petugas.nama_petugas');
            }

            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.kandang.action', ['id' => $row->id])->render();
                })
                ->addColumn('pemilik_name', function ($row) {
                    return $row->nama_pemilik ?? 'Tidak tersedia';
                })
                ->addColumn('petugas_name', function ($row) {
                    return $row->nama_petugas ?? 'Tidak tersedia';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.kandang.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find TernakKandang by ID and eagerly load all related data
        $kandang = TernakKandang::with([
            'pemilik',
            'detailTernakKandangs.petugas',
            'detailTernakHewans.ternakHewan'
        ])->findOrFail($id);

        // Fetch data for dropdowns
        $pemilik = Pemilik::all();
        $petugas = Petugas::all();

        // Return view with the data
        return view('admin.kandang.show', compact('kandang', 'pemilik', 'petugas'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'kode_kandang' => 'required|string|max:255|unique:ternak_kandang,kode_kandang',
            'total_ternak_kandang' => 'required|numeric|min:0',
            'nama_pemilik_id' => 'required|exists:pemilik,id',
            'total_ternak' => 'nullable|numeric|min:0',
            'total_bb' => 'nullable|numeric|min:0',
            'nama_petugas_id' => 'nullable|exists:petugas,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::transaction(function () use ($request) {
                // First, create TernakKandang record
                $kandang = new TernakKandang();
                $kandang->kode_kandang = $request->kode_kandang;
                $kandang->total_ternak_kandang = $request->total_ternak_kandang;
                $kandang->nama_pemilik_id = $request->nama_pemilik_id;
                $kandang->save();

                // Now create DetailTernakKandang record
                $detail = new DetailTernakKandang();
                $detail->kode_kandang_id = $kandang->id;
                $detail->total_ternak = $request->total_ternak ?? 0;
                $detail->total_bb = $request->total_bb ?? 0;
                $detail->nama_petugas_id = $request->nama_petugas_id;
                $detail->nama_pemilik_id = $request->nama_pemilik_id; // Use same pemilik ID
                $detail->save();
            });

            return redirect()->route('kandang.index')
                ->with('success', 'Data Kandang berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        // Find TernakKandang by ID with eager loading detail
        $kandang = TernakKandang::with('detailTernakKandangs')->findOrFail($id);

        // Prepare response data
        $response = [
            'id' => $kandang->id,
            'kode_kandang' => $kandang->kode_kandang,
            'total_ternak_kandang' => $kandang->total_ternak_kandang,
            'nama_pemilik_id' => $kandang->nama_pemilik_id,
        ];

        // Add detail data if available
        // Make sure to check if relationship exists and has items
        if ($kandang->detailTernakKandangs && $kandang->detailTernakKandangs->count() > 0) {
            $detail = $kandang->detailTernakKandangs->first();
            $response['detail'] = [
                'id' => $detail->id,
                'kode_kandang_id' => $detail->kode_kandang_id,
                'total_ternak' => $detail->total_ternak,
                'total_bb' => $detail->total_bb,
                'nama_petugas_id' => $detail->nama_petugas_id,
                'nama_pemilik_id' => $detail->nama_pemilik_id,
            ];
        }

        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'kode_kandang' => 'required|string|max:255|unique:ternak_kandang,kode_kandang,' . $id,
            'total_ternak_kandang' => 'required|numeric|min:0',
            'nama_pemilik_id' => 'required|exists:pemilik,id',
            'total_ternak' => 'nullable|numeric|min:0',
            'total_bb' => 'nullable|numeric|min:0',
            'nama_petugas_id' => 'nullable|exists:petugas,id',
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
                // Find the TernakKandang record
                $kandang = TernakKandang::findOrFail($id);

                // Update TernakKandang record
                $kandang->kode_kandang = $request->kode_kandang;
                $kandang->total_ternak_kandang = $request->total_ternak_kandang;
                $kandang->nama_pemilik_id = $request->nama_pemilik_id;
                $kandang->save();

                // Get detail record or create if not exists
                $detail = DetailTernakKandang::firstOrNew(['kode_kandang_id' => $kandang->id]);
                $detail->kode_kandang_id = $kandang->id;
                $detail->total_ternak = $request->total_ternak ?? 0;
                $detail->total_bb = $request->total_bb ?? 0;
                $detail->nama_petugas_id = $request->nama_petugas_id;
                $detail->nama_pemilik_id = $request->nama_pemilik_id; // Use same pemilik ID
                $detail->save();
            });

            if ($isAjax) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Kandang berhasil diperbarui.'
                ]);
            }

            return redirect()->route('kandang.index')
                ->with('success', 'Data Kandang berhasil diperbarui.');
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

    public function destroy($id)
    {
        try {
            // Find the TernakKandang record
            $kandang = TernakKandang::findOrFail($id);

            // Delete related DetailTernakKandang records
            DetailTernakKandang::where('kode_kandang_id', $kandang->id)->delete();

            // Delete TernakKandang record
            $kandang->delete();

            return response()->json(['success' => 'Data telah dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function batchDelete(Request $request)
    {
        try {
            // Debug output to log
            \Log::info('Batch Delete Request:', ['ids' => $request->ids]);

            // Validate the request
            if (!$request->has('ids') || !is_array($request->ids) || empty($request->ids)) {
                return response()->json(['error' => 'Tidak ada data yang dipilih untuk dihapus.'], 400);
            }

            $ids = $request->ids;

            // Get TernakKandang records
            $kandangs = TernakKandang::whereIn('id', $ids)->get();

            \Log::info('Found records:', ['count' => $kandangs->count()]);

            if ($kandangs->isEmpty()) {
                return response()->json(['error' => 'Tidak ada data yang ditemukan.'], 404);
            }

            DB::beginTransaction();

            try {
                foreach ($kandangs as $kandang) {
                    // Delete related DetailTernakKandang records
                    DetailTernakKandang::where('kode_kandang_id', $kandang->id)->delete();

                    // Delete the kandang record itself
                    $kandang->delete();
                }

                DB::commit();

                return response()->json(['success' => 'Data berhasil dihapus.']);

            } catch (\Exception $e) {
                DB::rollBack();
                \Log::error('Error in batch delete transaction: ' . $e->getMessage());
                return response()->json(['error' => 'Terjadi kesalahan dalam transaksi: ' . $e->getMessage()], 500);
            }
        } catch (\Exception $e) {
            \Log::error('Error in batch delete: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    // gawe export excel
    public function excel()
    {
        return Excel::download(new KandangExport, 'kandang.xlsx');
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
            Excel::import(new KandangImport, $request->file('file'));

            return redirect()->route('kandang.index')
                ->with('success', 'Data berhasil diimport.');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $errors = [];

            foreach ($failures as $failure) {
                $errors[] = 'Baris ' . $failure->row() . ': ' . implode(', ', $failure->errors());
            }

            return redirect()->route('kandang.index')
                ->with('error', 'Gagal import data: ' . implode('<br>', $errors));
        } catch (\Exception $e) {
            return redirect()->route('kandang.index')
                ->with('error', 'Gagal import data: ' . $e->getMessage());
        }
    }

    // Method gawe download file csv
    public function template()
    {
        // Fetch data for dropdown lists
        $petugasList = Petugas::pluck('nama_petugas')->toArray();
        $pemilikList = Pemilik::pluck('nama_pemilik')->toArray();

        // Get sample IDs for examples
        $petugasId = Petugas::first()->id ?? 1;
        $pemilikId = Pemilik::first()->id ?? 1;

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="template_import_kandang.csv"',
        ];

        $callback = function () use ($petugasList, $pemilikList, $petugasId, $pemilikId) {
            $file = fopen('php://output', 'w');

            // CSV headers matching the field names expected by KandangImport
            fputcsv($file, [
                'kode_kandang',
                'total_ternak_kandang',
                'pemilik',
                'total_ternak',
                'total_bb',
                'petugas'
            ]);

            // Example row using names
            fputcsv($file, [
                'KND001',
                '10',
                $pemilikList[0] ?? 'Pemilik1',
                '5',
                '150.5',
                $petugasList[0] ?? 'Petugas1',
            ]);

            // Example row using IDs
            fputcsv($file, [
                'KND002',
                '15',
                $pemilikId,
                '7',
                '200.75',
                $petugasId,
            ]);

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
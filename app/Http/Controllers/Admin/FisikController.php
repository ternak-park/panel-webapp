<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TernakFisik;
use App\Models\TernakHewan;
use App\Exports\FisikExport;
use App\Imports\FisikImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FisikController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['main'] = 'Fisik';
        $data['judul'] = 'Manajemen Fisik';
        $data['sub_judul'] = 'Data Fisik Hewan';
        $data['hewan'] = TernakHewan::all();

        if ($request->ajax()) {
            // Build the query for physical data
            $query = TernakFisik::select([
                'ternak_fisik.id',
                'ternak_fisik.ternak_tag_id',
                'ternak_fisik.tgl_masuk_lahir_fisik',
                'ternak_fisik.berat_masuk_fisik',
                'ternak_fisik.tgl_timbang_terakhir_fisik',
                'ternak_fisik.berat_terakhir_fisik',
                DB::raw('(ternak_fisik.berat_terakhir_fisik - ternak_fisik.berat_masuk_fisik) as kenaikan_berat_fisik')
            ]);

            // Join with TernakHewan to get tag information
            if (Schema::hasTable('ternak_hewan')) {
                $query->leftJoin('ternak_hewan', 'ternak_fisik.ternak_tag_id', '=', 'ternak_hewan.id')
                      ->addSelect('ternak_hewan.tag_hewan');
            }

            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.fisik.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // Statistics for dashboard cards
        $stats = [
            'total_hewan' => TernakFisik::count(),
            'avg_kenaikan' => TernakFisik::select(
                DB::raw('AVG(berat_terakhir_fisik - berat_masuk_fisik) as avg_kenaikan')
            )->first()->avg_kenaikan ?? 0,
            'max_kenaikan' => TernakFisik::select(
                DB::raw('MAX(berat_terakhir_fisik - berat_masuk_fisik) as max_kenaikan')
            )->first()->max_kenaikan ?? 0
        ];

        $data['stats'] = $stats;

        return view('admin.fisik.index', $data);
    }

    public function show($id)
    {
        // Find TernakFisik record by ID
        $ternakFisik = TernakFisik::with('ternakHewan')->findOrFail($id);

        return view('admin.fisik.show', compact('ternakFisik'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'ternak_tag_id' => 'required|exists:ternak_hewan,id',
            'tgl_masuk_lahir_fisik' => 'required|date',
            'berat_masuk_fisik' => 'required|numeric|min:0',
            'tgl_timbang_terakhir_fisik' => 'required|date',
            'berat_terakhir_fisik' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::transaction(function () use ($request) {
                // Create new TernakFisik record
                $ternakFisik = new TernakFisik();
                $ternakFisik->ternak_tag_id = $request->ternak_tag_id;
                $ternakFisik->tgl_masuk_lahir_fisik = $request->tgl_masuk_lahir_fisik;
                $ternakFisik->berat_masuk_fisik = $request->berat_masuk_fisik;
                $ternakFisik->tgl_timbang_terakhir_fisik = $request->tgl_timbang_terakhir_fisik;
                $ternakFisik->berat_terakhir_fisik = $request->berat_terakhir_fisik;

                // Calculate weight gain automatically
                $ternakFisik->kenaikan_berat_fisik = $request->berat_terakhir_fisik - $request->berat_masuk_fisik;

                $ternakFisik->save();
            });

            return redirect()->route('fisik.index')
                ->with('success', 'Data Fisik berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'ternak_tag_id' => 'required|exists:ternak_hewan,id',
            'tgl_masuk_lahir_fisik' => 'required|date',
            'berat_masuk_fisik' => 'required|numeric|min:0',
            'tgl_timbang_terakhir_fisik' => 'required|date',
            'berat_terakhir_fisik' => 'required|numeric|min:0',
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
                // Find the TernakFisik record
                $ternakFisik = TernakFisik::findOrFail($id);

                // Update TernakFisik record
                $ternakFisik->ternak_tag_id = $request->ternak_tag_id;
                $ternakFisik->tgl_masuk_lahir_fisik = $request->tgl_masuk_lahir_fisik;
                $ternakFisik->berat_masuk_fisik = $request->berat_masuk_fisik;
                $ternakFisik->tgl_timbang_terakhir_fisik = $request->tgl_timbang_terakhir_fisik;
                $ternakFisik->berat_terakhir_fisik = $request->berat_terakhir_fisik;

                // Calculate weight gain (handled by database trigger or computed column if available)
                $kenaikanBerat = $request->berat_terakhir_fisik - $request->berat_masuk_fisik;

                // If there's a column for it, update it (otherwise it might be a computed column)
                if (Schema::hasColumn('ternak_fisik', 'kenaikan_berat_fisik')) {
                    $ternakFisik->kenaikan_berat_fisik = $kenaikanBerat;
                }

                $ternakFisik->save();
            });

            if ($isAjax) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Fisik berhasil diperbarui.'
                ]);
            }

            return redirect()->route('fisik.index')
                ->with('success', 'Data Fisik berhasil diperbarui.');
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
        // Find TernakFisik by ID
        $ternakFisik = TernakFisik::with('ternakHewan')->findOrFail($id);

        // Prepare response data
        $response = [
            'id' => $ternakFisik->id,
            'ternak_tag_id' => $ternakFisik->ternak_tag_id,
            'tag_hewan' => $ternakFisik->ternakHewan->tag_hewan ?? 'Unknown',
            'tgl_masuk_lahir_fisik' => $ternakFisik->tgl_masuk_lahir_fisik,
            'berat_masuk_fisik' => $ternakFisik->berat_masuk_fisik,
            'tgl_timbang_terakhir_fisik' => $ternakFisik->tgl_timbang_terakhir_fisik,
            'berat_terakhir_fisik' => $ternakFisik->berat_terakhir_fisik,
            'kenaikan_berat_fisik' => $ternakFisik->berat_terakhir_fisik - $ternakFisik->berat_masuk_fisik,
        ];

        return response()->json($response);
    }

    public function destroy($id)
    {
        try {
            // Find the TernakFisik record
            $ternakFisik = TernakFisik::findOrFail($id);

            // Delete TernakFisik record
            $ternakFisik->delete();

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

            // Get TernakFisik records
            $ternakFisiks = TernakFisik::whereIn('id', $ids)->get();

            \Log::info('Found records:', ['count' => $ternakFisiks->count()]);

            if ($ternakFisiks->isEmpty()) {
                return response()->json(['error' => 'Tidak ada data yang ditemukan.'], 404);
            }

            DB::beginTransaction();

            try {
                foreach ($ternakFisiks as $fisik) {
                    // Delete the physical data record
                    $fisik->delete();
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

    /* export excel */
    public function excel()
    {
        return Excel::download(new FisikExport, 'fisik.xlsx');
    }

    /* import csv */
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
            Excel::import(new FisikImport, $request->file('file'));

            return redirect()->route('fisik.index')
                ->with('success', 'Data berhasil diimport.');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $errors = [];

            foreach ($failures as $failure) {
                $errors[] = 'Baris ' . $failure->row() . ': ' . implode(', ', $failure->errors());
            }

            return redirect()->route('fisik.index')
                ->with('error', 'Gagal import data: ' . implode('<br>', $errors));
        } catch (\Exception $e) {
            return redirect()->route('fisik.index')
                ->with('error', 'Gagal import data: ' . $e->getMessage());
        }
    }

    // Method untuk download template csv
    public function template()
    {
        // Get sample tag IDs for examples
        $hewanSample = TernakHewan::first();
        $tagId = $hewanSample ? $hewanSample->id : 1;
        $tagName = $hewanSample ? $hewanSample->tag_hewan : 'TAG001';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="template_import_fisik.csv"',
        ];

        $callback = function () use ($tagId, $tagName) {
            $file = fopen('php://output', 'w');

            // CSV headers matching the field names expected by FisikImport
            fputcsv($file, [
                'tag_id',
                'tag_name', // For reference only during import
                'tgl_masuk_lahir',
                'berat_masuk',
                'tgl_timbang_terakhir',
                'berat_terakhir',
                'kenaikan_berat' // Calculated automatically, for reference only
            ]);

            // Example row
            fputcsv($file, [
                $tagId,
                $tagName,
                date('Y-m-d'),
                '10.5', // BB masuk in kg
                date('Y-m-d'), // Tanggal timbang terakhir
                '15.2', // BB terakhir in kg
                '4.7'  // Kenaikan berat (calculated automatically)
            ]);

            // Another example row
            fputcsv($file, [
                $tagId,
                $tagName,
                date('d/m/Y', strtotime('-30 days')),
                '8.3',
                date('d/m/Y'),
                '12.6',
                '4.3'
            ]);

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TernakKandang;
use App\Models\DetailTernakKandang;
use App\Models\Jenis;
use App\Models\Pemilik;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\KandangExport;
use App\Imports\KandangImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KandangTemplateExport;

class KandangController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['main'] = 'Kandang';
        $data['judul'] = 'Manajemen Kandang';
        $data['sub_judul'] = 'Data Kandang';

        if ($request->ajax()) {
            $data = TernakKandang::with(['pemilik', 'detail_kandang.petugas'])->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.kandang.show', $row->id) . '" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a> ';
                    $actionBtn .= '<a href="' . route('admin.kandang.edit', $row->id) . '" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> ';
                    $actionBtn .= '<button type="button" class="btn btn-danger btn-sm delete-item" data-id="' . $row->id . '"><i class="fa fa-trash"></i></button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.kandang.index');
    }

    public function create()
    {
        $jenis = Jenis::all();
        $pemilik = Pemilik::all();
        $petugas = Petugas::all();
        return view('admin.kandang.create', compact('jenis', 'pemilik', 'petugas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kandang' => 'required|unique:ternak_kandang,kode_kandang',
            'jenis_id' => 'required|exists:jenis,id',
            'pemilik_id' => 'required|exists:pemilik,id',
            'petugas_id' => 'required|exists:petugas,id',
            'total_ternak_kandang' => 'required|integer',
            // Add other validation rules as needed
        ]);

        $kandang = TernakKandang::create([
            'kode_kandang' => $request->kode_kandang,
            'jenis_id' => $request->jenis_id,
            'pemilik_id' => $request->pemilik_id,
            'total_ternak_kandang' => $request->total_ternak_kandang,
            // Add other fields as needed
        ]);

        DetailTernakKandang::create([
            'kandang_id' => $kandang->id,
            'petugas_id' => $request->petugas_id,
            // Add other fields as needed
        ]);

        return redirect()->route('admin.kandang.index')->with('success', 'Data kandang berhasil ditambahkan');
    }

    public function show($id)
    {
        $kandang = TernakKandang::with(['pemilik', 'detail_kandang.petugas', 'jenis'])->findOrFail($id);
        return view('admin.kandang.show', compact('kandang'));
    }

    public function edit($id)
    {
        $kandang = TernakKandang::with(['detail_kandang'])->findOrFail($id);
        $jenis = Jenis::all();
        $pemilik = Pemilik::all();
        $petugas = Petugas::all();
        return view('admin.kandang.edit', compact('kandang', 'jenis', 'pemilik', 'petugas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kandang' => 'required|unique:ternak_kandang,kode_kandang,' . $id,
            'jenis_id' => 'required|exists:jenis,id',
            'pemilik_id' => 'required|exists:pemilik,id',
            'petugas_id' => 'required|exists:petugas,id',
            'total_ternak_kandang' => 'required|integer',
            // Add other validation rules as needed
        ]);

        $kandang = TernakKandang::findOrFail($id);
        $kandang->update([
            'kode_kandang' => $request->kode_kandang,
            'jenis_id' => $request->jenis_id,
            'pemilik_id' => $request->pemilik_id,
            'total_ternak_kandang' => $request->total_ternak_kandang,
            // Add other fields as needed
        ]);

        $detailKandang = DetailTernakKandang::where('kandang_id', $id)->first();
        if ($detailKandang) {
            $detailKandang->update([
                'petugas_id' => $request->petugas_id,
                // Add other fields as needed
            ]);
        } else {
            DetailTernakKandang::create([
                'kandang_id' => $id,
                'petugas_id' => $request->petugas_id,
                // Add other fields as needed
            ]);
        }

        return redirect()->route('admin.kandang.index')->with('success', 'Data kandang berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kandang = TernakKandang::findOrFail($id);
        $kandang->delete();
        return response()->json(['success' => true]);
    }

    public function export()
    {
        return Excel::download(new KandangExport, 'kandang.xlsx');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new KandangImport, $request->file('file'));

        return redirect()->route('admin.kandang.index')->with('success', 'Data kandang berhasil diimport');
    }

    public function batchDelete(Request $request)
    {
        $ids = $request->ids;
        TernakKandang::whereIn('id', $ids)->delete();
        return response()->json(['success' => "Data kandang berhasil dihapus"]);
    }
}

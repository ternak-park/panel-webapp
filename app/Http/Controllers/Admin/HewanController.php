<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TernakHewan;
use Yajra\DataTables\Facades\DataTables;

class HewanController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['main'] = 'Hewan';
        $data['judul'] = 'Manajemen Hewan';
        $data['sub_judul'] = 'Data Hewan';
        if ($request->ajax()) {
            $data = TernakHewan::with('tipe:id,nama_tipe')
                ->select('id', 'tag', 'jenis', 'sex', 'ternak_tipe', 'gambar_hewan');
            return Datatables::of($data)
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

        return view('admin.hewan.index', $data);

    }

    public function show($id)
    {
        $ternakHewan = TernakHewan::with([
            'ternakDetail.status',
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
}

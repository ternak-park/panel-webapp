<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TernakKondisi;
use Yajra\DataTables\Facades\DataTables;

class KondisiController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['main'] = 'Kondisi';
        $data['judul'] = 'Manajemen Kondisi Hewan';
        $data['sub_judul'] = 'Data Kondisi Hewan';
        if ($request->ajax()) {
            $data = TernakKondisi::with('kesehatan', 'status')
                ->select('id', 'ternak_tag', 'ternak_kesehatan', 'ternak_status');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.kondisi.action', ['id' => $row->id])->render();
                })
                ->editColumn('ternak_kesehatan', function ($row) {
                    return $row->kesehatan->nama_kesehatan ?? 'Tidak tersedia'; // Nama kesehatan
                })
                ->editColumn('ternak_status', function ($row) {
                    return $row->status->nama_status ?? 'Tidak tersedia'; // Nama status
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.kondisi.index', $data);

    }
}

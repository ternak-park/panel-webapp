<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TernakDetail;
use Yajra\DataTables\Facades\DataTables;

class HewanDetailController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['main'] = 'Hewan';
        $data['judul'] = 'Manajemen Hewan';
        $data['sub_judul'] = 'Data Hewan';
        if ($request->ajax()) {
            $data = TernakDetail::select('id', 'ternak_tag', 'sex', 'tanggal_masuk', 'ternak_status', 'ternak_jenis', 'ternak_program', 'ternak_kandang', 'jenis_kandang');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.status.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.hewan.detail.index', $data);

    }
}

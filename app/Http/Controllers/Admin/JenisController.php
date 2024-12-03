<?php

namespace App\Http\Controllers\admin;
use App\Models\Jenis;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['main'] = 'Jenis';
        $data['judul'] = 'Manajemen Jenis';
        $data['sub_judul'] = 'Data Jenis Domba';
        if ($request->ajax()) {
            $data = Jenis::select('id', 'nama_jenis', 'created_at', 'updated_at');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.jenis.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.jenis.index', $data);

    }
}

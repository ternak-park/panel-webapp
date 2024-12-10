<?php

namespace App\Http\Controllers\admin;
use App\Models\Tipe;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
class TipeController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['main'] = 'Tipe';
        $data['judul'] = 'Manajemen Tipe';
        $data['sub_judul'] = 'Data Tipe Hewan';
        if ($request->ajax()) {
            $data = Tipe::select('id', 'nama_tipe', 'created_at', 'updated_at');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.tipe.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.tipe.index', $data);

    }
}

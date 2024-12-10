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
            $data = TernakHewan::select('id', 'tag', 'jenis_hewan', 'sex');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.hewan.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.hewan.index', $data);

    }

    public function show($id)
    {
        $ternakHewan = TernakHewan::with([
            'kandang.pemilik',
            'ternakDetail.status',
            'jenis',
            'program',
            'kandang'
        ])
            ->where('id', $id)
            ->firstOrFail();

        return view('admin.hewan.show', compact('ternakHewan'));
    }



}

<?php

namespace App\Http\Controllers\admin;
use App\Models\Program;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['main'] = 'Program';
        $data['judul'] = 'Manajemen Program';
        $data['sub_judul'] = 'Data Program Hewan';
        if ($request->ajax()) {
            $data = Program::select('id', 'nama_program', 'created_at', 'updated_at');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.program.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.program.index', $data);

    }
}

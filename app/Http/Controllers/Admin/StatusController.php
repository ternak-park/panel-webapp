<?php

namespace App\Http\Controllers\admin;
use App\Models\Status;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['judul'] = 'Manajemen Status';
        if ($request->ajax()) {
            $data = Status::select('id', 'nama_status', 'created_at', 'updated_at');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.status.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.status.index', $data);

    }
}

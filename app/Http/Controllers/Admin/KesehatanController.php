<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kesehatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;

class KesehatanController extends Controller
{
    public function index(Request $request)
    {
        $kesehatan = Kesehatan::all();
        $data = [];
        $data['main'] = 'Kesehatan';
        $data['judul'] = 'Manajemen Kesehatan';
        $data['sub_judul'] = 'Data Kesehatan Domba';
        if ($request->ajax()) {
            $data = Kesehatan::select('id', 'nama_kesehatan', 'created_at', 'updated_at');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.kesehatan.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.kesehatan.index', $data);

    }

    public function destroy($id)
    {
        $kesehatan = Kesehatan::findOrFail($id);
        $kesehatan->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TernakKandang;
use Yajra\DataTables\Facades\DataTables;

class KandangController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['main'] = 'Kandang';
        $data['judul'] = 'Manajemen Kandang';
        $data['sub_judul'] = 'Data Kandang';

        if ($request->ajax()) {
            $data = DB::table('ternak_kandang')
                ->leftJoin('users', 'ternak_kandang.pemilik', '=', 'users.id')
                ->select(
                    'ternak_kandang.id',
                    'ternak_kandang.kode_kandang',
                    DB::raw('COALESCE(users.username, "-") as pemilik_username')
                );

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.kandang.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.kandang.index', $data);
    }

    public function destroy($id)
    {
        $kandang = TernakKandang::findOrFail($id);
        $kandang->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}

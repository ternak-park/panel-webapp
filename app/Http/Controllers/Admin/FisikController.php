<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\TernakFisik;
use Yajra\DataTables\Facades\DataTables;


class FisikController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['main'] = 'Fisik';
        $data['judul'] = 'Manajemen Fisik Hewan';
        $data['sub_judul'] = 'Data Fisik';
        if ($request->ajax()) {
            $data = TernakFisik::select('id', 'ternak_tag', 'berat_masuk', 'berat_terakhir', 'kenaikan_berat');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.fisik.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.fisik.index', $data);

    }
}

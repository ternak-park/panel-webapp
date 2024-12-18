<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TernakReproduksi;
use Yajra\DataTables\Facades\DataTables;


class ReproduksiController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['main'] = 'Reproduksi';
        $data['judul'] = 'Manajemen Reproduksi Hewan';
        $data['sub_judul'] = 'Data Reproduksi Hewan';
        if ($request->ajax()) {
            $data = TernakReproduksi::select('id', 'ternak_tag', 'tanggal_birahi', 'tanggal_kawin', 'tanggal_ib', 'nomor_semen', 'jenis_semen', );
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.reproduksi.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.reproduksi.index', $data);

    }

    public function destroy($id)
    {
        $reproduksi = TernakReproduksi::findOrFail($id);
        $reproduksi->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}

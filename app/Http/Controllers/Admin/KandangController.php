<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailTernakKandang;
use App\Models\TernakKandang;
use Yajra\DataTables\Facades\DataTables;

class KandangController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'main' => 'Kandang',
            'judul' => 'Manajemen Kandang',
            'sub_judul' => 'Data Kandang'
        ];

        if ($request->ajax()) {
            $query = DetailTernakKandang::with([
                'kandang.petugas',
                'jenisDomba',
                'beratDomba',
                'kondisiDomba',
                'hewan'
            ]);
            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.kandang.action', ['id' => $row->id])->render();
                })
                ->addColumn('jenisDomba.nama_tipe', function ($row) {
                    return $row->jenisDomba ? $row->jenisDomba->nama_tipe : null;
                })
                ->addColumn('beratDomba.berat_terakhir', function ($row) {
                    return $row->beratDomba ? $row->beratDomba->berat_terakhir : null;
                })
                ->addColumn('kondisiDomba.nama_kesehatan', function ($row) {
                    return $row->kondisiDomba ? $row->kondisiDomba->nama_kesehatan : null;
                })
                ->addColumn('kandang.petugas.nama_petugas', function ($row) {
                    return $row->kandang && $row->kandang->petugas ? $row->kandang->petugas->nama_petugas : null;
                })

                // fungsi search nya mas 
                ->filter(function ($query) use ($request) {
                    if ($request->has('search') && $request->input('search.value')) {
                        $searchValue = $request->input('search.value');
                        $query->where(function ($q) use ($searchValue) {
                            $q->where('kode_kandang', 'like', "%{$searchValue}%")
                              ->orWhereHas('hewan', function($q) use ($searchValue) {
                                  $q->where('tag', 'like', "%{$searchValue}%");
                              })
                              ->orWhereHas('jenisDomba', function($q) use ($searchValue) {
                                  $q->where('nama_tipe', 'like', "%{$searchValue}%");
                              })
                              ->orWhereHas('beratDomba', function($q) use ($searchValue) {
                                  $q->where('berat_terakhir', 'like', "%{$searchValue}%");
                              })
                              ->orWhereHas('kondisiDomba', function($q) use ($searchValue) {
                                  $q->where('nama_kesehatan', 'like', "%{$searchValue}%");
                              })
                              ->orWhereHas('kandang.petugas', function($q) use ($searchValue) {
                                  $q->where('nama_petugas', 'like', "%{$searchValue}%");
                              });
                        });
                    }
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
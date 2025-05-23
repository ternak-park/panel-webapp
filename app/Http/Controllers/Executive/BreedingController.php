<?php

namespace App\Http\Controllers\Executive;

use App\Http\Controllers\Controller;
use App\Models\Kesehatan;
use App\Models\Program;
use App\Models\Status;
use App\Models\TernakKandang;
use App\Models\Tipe;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TernakHewan;
use App\Exports\HewanExport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BreedingController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['main'] = 'Breeding';
        $data['judul'] = 'Manajemen Breeding';
        $data['sub_judul'] = 'Data Breeding';
        $data['hewan'] = TernakHewan::all();
        $data['status'] = Status::all();
        // $data['tipe'] = Tipe::all();
        $data['kesehatan'] = Kesehatan::all();
        $data['program'] = Program::all();
        $data['kandang'] = TernakKandang::all();

        $data['user'] = User::all();


        if ($request->ajax()) {
            $hewan = TernakHewan::with(['tipe:id,nama_tipe', 'detail.program:id,nama_program'])
                ->select('ternak_hewan.id', 'tag', 'jenis', 'sex', 'ternak_tipe');
            
            return Datatables::of($hewan)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.hewan.action', ['id' => $row->id])->render();
                })
                ->editColumn('ternak_tipe', function ($row) {
                    return $row->tipe->nama_tipe ?? 'Tidak tersedia';
                })
                ->addColumn('ternak_program', function ($row) {
                    return $row->detail->program->nama_program ?? 'Tidak tersedia';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('executive.breeding.index', $data);
    }
}

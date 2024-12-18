<?php

namespace App\Http\Controllers\admin;
use App\Models\Program;
use App\Exports\ProgramExport;
use Maatwebsite\Excel\Facades\Excel;
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
            $data = Program::select('id', 'kode_program', 'nama_program', 'deskripsi', 'created_at', 'updated_at');
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

    // gawe export excel
    public function excel()
    {
        return Excel::download(new ProgramExport, 'program.xlsx');
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}

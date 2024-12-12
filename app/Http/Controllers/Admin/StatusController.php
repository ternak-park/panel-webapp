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
        $status = Status::all(); 
        $data = [];
        $data['main'] = 'Status';
        $data['judul'] = 'Manajemen Status';
        $data['sub_judul'] = 'Data Status Domba';
        if ($request->ajax()) {
            $data = Status::select('id', 'kode_status', 'nama_status', 'deskripsi', 'created_at', 'updated_at');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_status' => 'required|string|max:255',
            'nama_status' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
        ]);

        $status = Status::findOrFail($id);
        $status->update($request->all());

        return redirect()->route('status.index')
            ->with('success', 'Data status berhasil diperbarui.');
    }
    public function edit($id)
    {
        $status = Status::findOrFail($id);
        return view('admin.status.edit', compact('status'));
    }
    public function show($id)
    {
        $status = Status::findOrFail($id);
        return view('admin.status.show', compact('status')); 
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'kode_status' => 'required|string|max:255',
            'nama_status' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
        ]);

        // Create a new status record
        Status::create([
            'kode_status' => $request->kode_status,
            'nama_status' => $request->nama_status,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect to the status list with a success message
        return redirect()->route('status.index')
            ->with('success', 'Status berhasil ditambahkan.');
    }
    public function create()
    {
        return view('admin.status.create');
    }
}

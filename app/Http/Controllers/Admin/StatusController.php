<?php

namespace App\Http\Controllers\admin;
use App\Exports\StatusExport;
use App\Models\Status;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

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
        $validator = Validator::make($request->all(), [
            'kode_status' => 'required|string|max:255',
            'nama_status' => 'required|string|max:255|unique:status,nama_status',
            'deskripsi' => 'required|string|max:255',
        ], [
            'kode_status.unique' => 'Kode status sudah terdaftar. Mohon gunakan kode yang lain.',
            'nama_status.unique' => 'Nama status sudah terdaftar. Mohon gunakan nama yang lain.',
            'kode_status.required' => 'Kode status harus diisi.',
            'nama_status.required' => 'Nama status harus diisi.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
        ]);

        if ($validator->fails()) {
            // Redirect kembali dengan error SweetAlert
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

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
        $validator = Validator::make($request->all(), [
            'kode_status' => 'required|string|max:255|unique:status,kode_status',
            'nama_status' => 'required|string|max:255|unique:status,nama_status',
            'deskripsi' => 'required|string|max:255',
        ], [
            'kode_status.unique' => 'Kode status sudah terdaftar. Mohon gunakan kode yang lain.',
            'nama_status.unique' => 'Nama status sudah terdaftar. Mohon gunakan nama yang lain.',
            'kode_status.required' => 'Kode status harus diisi.',
            'nama_status.required' => 'Nama status harus diisi.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
        ]);
        if ($validator->fails()) {
            // Redirect kembali dengan error SweetAlert
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new status record
        Status::create([
            'kode_status' => $request->kode_status,
            'nama_status' => $request->nama_status,
            'deskripsi' => $request->deskripsi,
            'created_at' => now(),
        ]);

        // Redirect to the status list with a success message
        return redirect()->route('status.index')
            ->with('success', 'Status berhasil ditambahkan.');
    }
    public function create()
    {
        return view('admin.status.create');
    }

    // gawe export excel
    public function excel()
    {
        return Excel::download(new StatusExport, 'status.xlsx');
    }
}

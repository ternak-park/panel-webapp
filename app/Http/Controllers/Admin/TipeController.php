<?php

namespace App\Http\Controllers\admin;
use App\Models\Tipe;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
class TipeController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['main'] = 'Tipe';
        $data['judul'] = 'Manajemen Tipe';
        $data['sub_judul'] = 'Data Tipe Hewan';
        if ($request->ajax()) {
            $data = Tipe::select('id', 'nama_tipe', 'created_at', 'updated_at');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.tipe.action', ['id' => $row->id])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.tipe.index', $data);

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_tipe' => 'required|string|max:255',
            'nama_tipe' => 'required|string|max:255|unique:tipe,nama_tipe',
            'deskripsi' => 'required|string|max:255',
        ], [
            'kode_tipe.unique' => 'Kode tipe sudah terdaftar. Mohon gunakan kode yang lain.',
            'nama_tipe.unique' => 'Nama tipe sudah terdaftar. Mohon gunakan nama yang lain.',
            'kode_tipe.required' => 'Kode tipe harus diisi.',
            'nama_tipe.required' => 'Nama tipe harus diisi.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
        ]);

        if ($validator->fails()) {
            // Redirect kembali dengan error SweetAlert
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $tipe = Tipe::findOrFail($id);
        $tipe->update($request->all());

        return redirect()->route('tipe.index')
            ->with('success', 'Data tipe berhasil diperbarui.');
    }
    public function edit($id)
    {
        $tipe = Tipe::findOrFail($id);
        return view('admin.tipe.edit', compact('tipe'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'kode_tipe' => 'required|string|max:255',
            'nama_tipe' => 'required|string|max:255|unique:tipe,nama_tipe',
            'deskripsi' => 'required|string|max:255',
        ], [
            'kode_tipe.unique' => 'Kode tipe sudah terdaftar. Mohon gunakan kode yang lain.',
            'nama_tipe.unique' => 'Nama tipe sudah terdaftar. Mohon gunakan nama yang lain.',
            'kode_tipe.required' => 'Kode tipe harus diisi.',
            'nama_tipe.required' => 'Nama tipe harus diisi.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
        ]);
        if ($validator->fails()) {
            // Redirect kembali dengan error SweetAlert
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new tipe record
        Tipe::create([
            'kode_tipe' => $request->kode_tipe,
            'nama_tipe' => $request->nama_tipe,
            'deskripsi' => $request->deskripsi,
            'created_at' => now(),
        ]);

        // Redirect to the tipe list with a success message
        return redirect()->route('tipe.index')
            ->with('success', 'Tipe berhasil ditambahkan.');
    }
    public function create()
    {
        return view('admin.tipe.create');
    }
}

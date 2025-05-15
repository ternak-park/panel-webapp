@extends('components.app')
@section('title', 'Edit Kandang')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Kandang</div>
                    <div class="float-right">
                        <a href="{{ route('admin.kandang.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.kandang.update', $kandang->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kode_kandang">Kode Kandang</label>
                            <input type="text" name="kode_kandang" id="kode_kandang" class="form-control @error('kode_kandang') is-invalid @enderror" value="{{ old('kode_kandang', $kandang->kode_kandang) }}" required>
                            @error('kode_kandang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis_id">Jenis</label>
                            <select name="jenis_id" id="jenis_id" class="form-control @error('jenis_id') is-invalid @enderror" required>
                                <option value="">Pilih Jenis</option>
                                @foreach($jenis as $j)
                                <option value="{{ $j->id }}" {{ old('jenis_id', $kandang->jenis_id) == $j->id ? 'selected' : '' }}>{{ $j->nama }}</option>
                                @endforeach
                            </select>
                            @error('jenis_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kapasitas">Kapasitas</label>
                            <input type="number" name="kapasitas" id="kapasitas" class="form-control @error('kapasitas') is-invalid @enderror" value="{{ old('kapasitas', $kandang->kapasitas) }}" required>
                            @error('kapasitas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="">Pilih Status</option>
                                <option value="Tersedia" {{ old('status', $kandang->status) == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                <option value="Penuh" {{ old('status', $kandang->status) == 'Penuh' ? 'selected' : '' }}>Penuh</option>
                                <option value="Maintenance" {{ old('status', $kandang->status) == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

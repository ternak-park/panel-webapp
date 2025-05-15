@extends('components.app')
@section('title', 'Detail Kandang')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Detail Kandang</div>
                    <div class="float-right">
                        <a href="{{ route('admin.kandang.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Kode Kandang</th>
                                    <td>{{ $kandang->kode_kandang }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis</th>
                                    <td>{{ $kandang->jenis->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Kapasitas</th>
                                    <td>{{ $kandang->kapasitas }}</td>
                                </tr>
                                <tr>
                                    <th>Jumlah Ternak</th>
                                    <td>{{ $kandang->jumlah_ternak }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $kandang->status }}</td>
                                </tr>
                                <tr>
                                    <th>Dibuat Pada</th>
                                    <td>{{ $kandang->created_at->format('d-m-Y H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <th>Diperbarui Pada</th>
                                    <td>{{ $kandang->updated_at->format('d-m-Y H:i:s') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Daftar Ternak</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Kode Ternak</th>
                                                    <th>Jenis</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($kandang->ternakHewan as $key => $ternak)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $ternak->kode_ternak }}</td>
                                                    <td>{{ $ternak->jenis->nama }}</td>
                                                    <td>{{ $ternak->status->nama }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

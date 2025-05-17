<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Info Kandang</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="datagrid">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Kode Kandang</div>
                                    <div class="input-icon">
                                        <input type="text" value="{{ $kandang->kode_kandang }}" class="form-control"
                                            placeholder="Tidak Ada" readonly />
                                        <span class="input-icon-addon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M15 3v4a1 1 0 0 0 1 1h4" />
                                                <path
                                                    d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
                                                <path
                                                    d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Total Ternak Kandang (Kapasitas)</div>
                                    <div class="input-icon">
                                        <input type="text" value="{{ $kandang->total_ternak_kandang }}" class="form-control"
                                            placeholder="Tidak Ada" readonly />
                                        <span class="input-icon-addon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M15 3v4a1 1 0 0 0 1 1h4" />
                                                <path
                                                    d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
                                                <path
                                                    d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Pemilik</div>
                                    <div class="datagrid-content">
                                        {{ $kandang->pemilik ? $kandang->pemilik->nama_pemilik : 'Tidak Ada Pemilik' }}
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Tanggal Dibuat</div>
                                    <div class="datagrid-content">
                                        {{ $kandang->created_at ? $kandang->created_at->format('d-m-Y') : 'Tidak Tersedia' }}
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Terakhir Diperbarui</div>
                                    <div class="datagrid-content">
                                        {{ $kandang->updated_at ? $kandang->updated_at->format('d-m-Y') : 'Tidak Tersedia' }}
                                    </div>
                                </div>
                                
                                @if($kandang->detailTernakKandangs && $kandang->detailTernakKandangs->count() > 0)
                                    @php $detail = $kandang->detailTernakKandangs->first(); @endphp
                                
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Total Ternak (Terisi)</div>
                                        <div class="input-icon">
                                            <input type="text" value="{{ $detail->total_ternak ?? 0 }}" class="form-control"
                                                placeholder="Tidak Ada" readonly />
                                            <span class="input-icon-addon">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M15 3v4a1 1 0 0 0 1 1h4" />
                                                    <path
                                                        d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
                                                    <path
                                                        d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Total Berat Badan</div>
                                        <div class="input-icon">
                                            <input type="text" value="{{ $detail->total_bb ?? 0 }} Kg" class="form-control"
                                                placeholder="Tidak Ada" readonly />
                                            <span class="input-icon-addon">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M15 3v4a1 1 0 0 0 1 1h4" />
                                                    <path
                                                        d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
                                                    <path
                                                        d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Petugas</div>
                                        <div class="datagrid-content">
                                            {{ $detail->petugas ? $detail->petugas->nama_petugas : 'Tidak Ada Petugas' }}
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Status Kandang</div>
                                    <div class="datagrid-content">
                                        @php
                                            $detailKandang = $kandang->detailTernakKandangs->first();
                                            $jumlahHewan = $detailKandang ? $detailKandang->total_ternak : 0;
                                            $kapasitas = $kandang->total_ternak_kandang ?? 0;
                                            
                                            $status = 'Tersedia';
                                            $statusClass = 'bg-success';
                                            
                                            if ($jumlahHewan >= $kapasitas && $kapasitas > 0) {
                                                $status = 'Penuh';
                                                $statusClass = 'bg-danger';
                                            } elseif ($jumlahHewan > 0) {
                                                $status = 'Sebagian Terisi';
                                                $statusClass = 'bg-warning';
                                            }
                                        @endphp
                                        <span class="badge {{ $statusClass }}">{{ $status }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Daftar Hewan dalam Kandang -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Daftar Hewan dalam Kandang</h3>
                                    <div class="card-actions">
                                        <span class="badge bg-blue">
                                            {{ $kandang->detailTernakHewans ? $kandang->detailTernakHewans->count() : 0 }} / {{ $kandang->total_ternak_kandang }} Hewan
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if($kandang->detailTernakHewans && $kandang->detailTernakHewans->count() > 0)
                                        <div class="table-responsive">
                                            <table class="table table-vcenter table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tag Hewan</th>
                                                        <th>Jenis</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($kandang->detailTernakHewans as $index => $detail)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>
                                                                @if($detail->ternakHewan)
                                                                    {{ $detail->ternakHewan->tag_hewan }}
                                                                @else
                                                                    <span class="text-muted">Tidak tersedia</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($detail->ternakHewan && $detail->ternakHewan->jenis)
                                                                    {{ $detail->ternakHewan->jenis->nama_jenis }}
                                                                @else
                                                                    <span class="text-muted">Tidak tersedia</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($detail->ternakHewan)
                                                                    {{ $detail->ternakHewan->sex_hewan }}
                                                                @else
                                                                    <span class="text-muted">Tidak tersedia</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($detail->status)
                                                                    {{ $detail->status->nama_status }}
                                                                @elseif($detail->ternakHewan && $detail->ternakHewan->detailTernakHewans->first() && $detail->ternakHewan->detailTernakHewans->first()->status)
                                                                    {{ $detail->ternakHewan->detailTernakHewans->first()->status->nama_status }}
                                                                @else
                                                                    <span class="text-muted">Tidak tersedia</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($detail->ternakHewan)
                                                                    <div class="btn-group">
                                                                        <a type="button" class="btn btn-sm btn-primary action-view"
                                                                            href="{{ route('hewan.show', $detail->ternakHewan->id) }}" style="padding: 4px 8px; font-size: 12px;">
                                                                            <i class="fa-solid fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="empty">
                                            <div class="empty-img">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-sad" width="128" height="128" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                                    <path d="M9 10l.01 0"></path>
                                                    <path d="M15 10l.01 0"></path>
                                                    <path d="M9.5 15.25a3.5 3.5 0 0 1 5 0"></path>
                                                </svg>
                                            </div>
                                            <p class="empty-title">Tidak ada hewan</p>
                                            <p class="empty-subtitle text-muted">
                                                Belum ada hewan yang ditempatkan di kandang ini
                                            </p>
                                            <div class="empty-action">
                                                <a href="{{ route('hewan.index') }}" class="btn btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M12 5l0 14"></path>
                                                        <path d="M5 12l14 0"></path>
                                                    </svg>
                                                    Tambahkan Hewan
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <div class="d-flex">
                        <a href="{{ route('kandang.index') }}" class="btn btn-link">Kembali</a>
                        <a href="#" class="btn btn-warning ms-auto btn-edit" data-id="{{ $kandang->id }}">Edit Kandang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.kandang.modal.edit')
    
    <script>
        // Handler untuk tombol edit di halaman detail
        document.addEventListener('DOMContentLoaded', function() {
            const editButton = document.querySelector('.btn-edit');
            if (editButton) {
                editButton.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    
                    // Gunakan event yang sudah ada di kandang.js
                    $(this).trigger('click');
                });
            }
        });
    </script>
</x-app>
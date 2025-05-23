<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                        <li class="nav-item">
                            <a href="#tab-info" class="nav-link active" data-bs-toggle="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z">
                                    </path>
                                    <path d="M7 8h10"></path>
                                    <path d="M7 12h10"></path>
                                    <path d="M7 16h10"></path>
                                </svg>
                                Detail Info Kandang
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab-hewan" class="nav-link" data-bs-toggle="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M10.5 18h3c1.9 0 3.5 -1.6 3.5 -3.5c0 -1.9 -1.6 -3.5 -3.5 -3.5h-10c-1.9 0 -3.5 1.6 -3.5 3.5c0 1.9 1.6 3.5 3.5 3.5h3.5">
                                    </path>
                                    <path d="M9.5 13v-2c0 -1.1 .9 -2 2 -2h1c1.1 0 2 .9 2 2v2"></path>
                                    <path d="M13 16.5v.5"></path>
                                    <path d="M10 16.5v.5"></path>
                                    <path d="M14 8v-1c0 -1.1 .9 -2 2 -2h3c1.1 0 2 .9 2 2v1"></path>
                                    <path d="M5 8v-1c0 -1.1 .9 -2 2 -2h3c1.1 0 2 .9 2 2v1"></path>
                                </svg>
                                Daftar Hewan
                                <span
                                    class="badge bg-blue ms-2">{{ $kandang->detailTernakHewans ? $kandang->detailTernakHewans->count() : 0 }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <!-- Tab Informasi Kandang -->
                        <div class="tab-pane active show" id="tab-info">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="text-center">
                                        {{-- <span class="avatar avatar-xl mb-4 rounded"
                                            style="
                                                background-image: url('{{ asset('storage/kandang/default.jpg') }}');
                                                background-size: cover;
                                                background-position: center;
                                                width: 100%;
                                                width: 400px;
                                                height: 400px;
                                                aspect-ratio: 1/1;
                                                border-radius: 50%;
                                            ">
                                        </span> --}}
                                        {{-- <h3 class="mb-0">{{ $kandang->kode_kandang }}</h3>
                                        <p class="text-muted">{{ $kandang->created_at->format('d-m-Y') }}</p> --}}

                                        @php
                                            $detailKandang = $kandang->detailTernakKandangs->first();
                                            $jumlahHewan = $detailKandang ? $detailKandang->total_ternak : 0;
                                            $kapasitas = $kandang->total_ternak_kandang ?? 0;

                                            $status = 'Tersedia';
                                            $statusClass = 'success';

                                            if ($jumlahHewan >= $kapasitas && $kapasitas > 0) {
                                                $status = 'Penuh';
                                                $statusClass = 'danger';
                                            } elseif ($jumlahHewan > 0) {
                                                $status = 'Sebagian Terisi';
                                                $statusClass = 'warning';
                                            }
                                        @endphp

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="datagrid">
                                        <div class="datagrid-item">
                                            <div class="datagrid-title">Kode Kandang</div>
                                            <div class="input-icon">
                                                <input type="text" value="{{ $kandang->kode_kandang }}"
                                                    class="form-control" placeholder="Tidak Ada" readonly />
                                                <span class="input-icon-addon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
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
                                                <input type="text" value="{{ $kandang->total_ternak_kandang }} ekor"
                                                    class="form-control" placeholder="Tidak Ada" readonly />
                                                <span class="input-icon-addon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
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

                                        @if ($kandang->detailTernakKandangs && $kandang->detailTernakKandangs->count() > 0)
                                            @php $detail = $kandang->detailTernakKandangs->first(); @endphp

                                            <div class="datagrid-item">
                                                <div class="datagrid-title">Total Ternak (Terisi)</div>
                                                <div class="input-icon">
                                                    <input type="text" value="{{ $detail->total_ternak ?? 0 }} ekor"
                                                        class="form-control" placeholder="Tidak Ada" readonly />
                                                    <span class="input-icon-addon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
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
                                                    <input type="text" value="{{ $detail->total_bb ?? 0 }} Kg"
                                                        class="form-control" placeholder="Tidak Ada" readonly />
                                                    <span class="input-icon-addon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
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
                                        <div class="datagrid-item">
                                            <div class="datagrid-title">Status Kandang</div>
                                            <div class="datagrid-content">
                                                <span class="badge bg-{{ $statusClass }}">{{ $status }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tab Daftar Hewan -->
                        <div class="tab-pane" id="tab-hewan">
                            <div class="d-flex justify-content-between mb-3">
                                <h3>Daftar Hewan dalam Kandang</h3>
                                <div>
                                    <a href="{{ route('hewan.index') }}" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-plus" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 5l0 14"></path>
                                            <path d="M5 12l14 0"></path>
                                        </svg>
                                        Tambah Hewan
                                    </a>
                                    <button type="button" class="btn btn-danger ms-2" id="deleteSelectedHewan"
                                        disabled>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 7l16 0"></path>
                                            <path d="M10 11l0 6"></path>
                                            <path d="M14 11l0 6"></path>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                        Hapus Terpilih
                                    </button>
                                </div>
                            </div>

                            @if ($kandang->detailTernakHewans && $kandang->detailTernakHewans->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-vcenter table-striped" id="tableHewanKandang">
                                        <thead>
                                            <tr>
                                                <th class="w-1">
                                                    <input class="form-check-input m-0 align-middle" type="checkbox"
                                                        id="select-all-hewan">
                                                </th>
                                                <th>No</th>
                                                <th>Tag Hewan</th>
                                                <th>Jenis</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kandang->detailTernakHewans as $index => $detail)
                                                <tr>
                                                    <td>
                                                        <input class="form-check-input m-0 align-middle hewan-checkbox"
                                                            type="checkbox"
                                                            value="{{ $detail->ternakHewan ? $detail->ternakHewan->id : '' }}"
                                                            {{ $detail->ternakHewan ? '' : 'disabled' }}>
                                                    </td>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        @if ($detail->ternakHewan)
                                                            {{ $detail->ternakHewan->tag_hewan }}
                                                        @else
                                                            <span class="text-muted">Tidak tersedia</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($detail->ternakHewan && $detail->ternakHewan->jenis)
                                                            {{ $detail->ternakHewan->jenis->nama_jenis }}
                                                        @else
                                                            <span class="text-muted">Tidak tersedia</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($detail->ternakHewan)
                                                            {{ $detail->ternakHewan->sex_hewan }}
                                                        @else
                                                            <span class="text-muted">Tidak tersedia</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($detail->status)
                                                            {{ $detail->status->nama_status }}
                                                        @elseif(
                                                            $detail->ternakHewan &&
                                                                $detail->ternakHewan->detailTernakHewans->first() &&
                                                                $detail->ternakHewan->detailTernakHewans->first()->status)
                                                            {{ $detail->ternakHewan->detailTernakHewans->first()->status->nama_status }}
                                                        @else
                                                            <span class="text-muted">Tidak tersedia</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($detail->ternakHewan)
                                                            <div class="btn-group">
                                                                <a href="{{ route('hewan.show', $detail->ternakHewan->id) }}"
                                                                    class="btn btn-sm btn-primary action-view"
                                                                    style="padding: 4px 8px; font-size: 12px;">
                                                                    <i class="fa-solid fa-eye"></i>
                                                                </a>
                                                                <button type="button"
                                                                    class="btn btn-sm btn-danger delete-hewan"
                                                                    data-id="{{ $detail->ternakHewan->id }}"
                                                                    style="padding: 4px 8px; font-size: 12px;">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
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
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-mood-sad" width="128"
                                            height="128" viewBox="0 0 24 24" stroke-width="1"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
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
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-plus" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
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
                <div class="card-footer text-end">
                    <div class="d-flex">
                        <a href="{{ route('kandang.index') }}" class="btn btn-link">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.kandang.modal.edit')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handler untuk tombol edit di halaman detail
            const editButton = document.querySelector('.btn-edit');
            if (editButton) {
                editButton.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');

                    // Gunakan event yang sudah ada di kandang.js
                    $(this).trigger('click');
                });
            }

            // Select all checkbox
            const selectAllCheckbox = document.getElementById('select-all-hewan');
            const hewanCheckboxes = document.querySelectorAll('.hewan-checkbox');
            const deleteSelectedButton = document.getElementById('deleteSelectedHewan');

            if (selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', function() {
                    const isChecked = this.checked;

                    hewanCheckboxes.forEach(checkbox => {
                        if (!checkbox.disabled) {
                            checkbox.checked = isChecked;
                        }
                    });

                    updateDeleteButtonState();
                });
            }

            // Individual checkboxes
            hewanCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    updateDeleteButtonState();

                    // Update select all checkbox
                    const allChecked = Array.from(hewanCheckboxes)
                        .filter(cb => !cb.disabled)
                        .every(cb => cb.checked);

                    if (selectAllCheckbox) {
                        selectAllCheckbox.checked = allChecked;
                    }
                });
            });

            // Update delete button state
            function updateDeleteButtonState() {
                const checkedCount = document.querySelectorAll('.hewan-checkbox:checked').length;

                if (deleteSelectedButton) {
                    deleteSelectedButton.disabled = checkedCount === 0;
                }
            }

            // Delete selected hewan
            if (deleteSelectedButton) {
                deleteSelectedButton.addEventListener('click', function() {
                    const selectedIds = [];

                    document.querySelectorAll('.hewan-checkbox:checked').forEach(checkbox => {
                        selectedIds.push(checkbox.value);
                    });

                    if (selectedIds.length > 0) {
                        if (confirm(
                                `Apakah Anda yakin ingin menghapus ${selectedIds.length} hewan terpilih?`
                            )) {
                            // Send delete request
                            fetch('/admin/hewan/batch-delete', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: JSON.stringify({
                                        ids: selectedIds
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        alert(data.success);
                                        // Reload the page to reflect changes
                                        window.location.reload();
                                    } else {
                                        alert(data.error || 'Terjadi kesalahan saat menghapus data');
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    alert('Terjadi kesalahan saat menghapus data');
                                });
                        }
                    }
                });
            }

            // Individual delete buttons
            const deleteButtons = document.querySelectorAll('.delete-hewan');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');

                    if (confirm('Apakah Anda yakin ingin menghapus hewan ini?')) {
                        // Send delete request
                        fetch(`/admin/hewan/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute('content')
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alert(data.success);
                                    // Reload the page to reflect changes
                                    window.location.reload();
                                } else {
                                    alert(data.error ||
                                        'Terjadi kesalahan saat menghapus data');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Terjadi kesalahan saat menghapus data');
                            });
                    }
                });
            });
        });
    </script>
</x-app>

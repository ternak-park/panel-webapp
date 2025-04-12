<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Overview
                            </div>
                            {{-- <td>{{ $kandang->pemilik->name ?? 'Tidak Ada Pemilik' }}</td> --}}

                            <h2 class="page-title">
                                {{ $judul }}
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <span class="d-none d-sm-inline">
                                    <a href="{{ route('hewan.excel') }}" class="btn">
                                        Cetak
                                    </a>
                                </span>
                                <button id="deleteSelected" class="btn btn-danger d-none d-sm-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M4 7l16 0"/>
                                        <path d="M10 11l0 6"/>
                                        <path d="M14 11l0 6"/>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"/>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"/>
                                    </svg>
                                    Hapus Terpilih
                                </button>
                                
                                <a href="{{ route('hewan.create') }}" class="btn btn-primary d-none d-sm-inline-block"
                                    data-bs-toggle="modal" data-bs-target="#modal-tambah-hewan">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /></svg>
                                   Import .csv
                                </a>
                                <a href="{{ route('hewan.create') }}" class="btn btn-primary d-none d-sm-inline-block"
                                    data-bs-toggle="modal" data-bs-target="#modal-tambah-hewan">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    Tambah {{ $main }}
                                </a>
                                <a href="" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                    data-bs-target="#modal-tambahData" aria-label="Tambah Produk">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hewan</h3>
                            <div class="card-actions">
                                <a href="#" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 5l0 14"></path>
                                        <path d="M5 12l14 0"></path>
                                    </svg>
                                    Tambah Hewan
                                </a>
                            </div>
                        </div>
                        
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-secondary">
                                    Menampilkan
                                    <div class="mx-2 d-inline-block">
                                        <select id="pageLength" class="form-select form-select-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                    hasil
                                </div>
                                <div class="ms-auto d-flex">
                                    <button id="deleteSelected_tableKandang" class="btn btn-sm btn-danger me-3 disabled" disabled>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 7l16 0"></path>
                                            <path d="M10 11l0 6"></path>
                                            <path d="M14 11l0 6"></path>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                        Hapus Terpilih
                                    </button>
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                                <path d="M21 21l-6 -6"></path>
                                            </svg>
                                        </span>
                                        <input type="text" id="searchInput" class="form-control" placeholder="Cari Hewan">
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        <div class="table-responsive">
                            <table class="table table-vcenter table-striped card-table datatable" id="tableKandang">
                                <thead>
                                    <tr>
                                        <th class="w-1">
                                            <input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Pilih semua item" />
                                        </th>
                                        <th class="w-1">No</th>
                                        <th>Kandang Tag</th>
                                        <th>Hewan Tag</th>
                                        <th>Tipe</th>
                                        <th>Berat</th>
                                        <th>Kondisi</th>
                                        <th>Petugas</th>
                                        <th class="w-1 text-end">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Table content will be dynamically loaded -->
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="card-footer d-flex align-items-center">
                            <p id="tableInfo" class="m-0 text-secondary">Data ke 1 ke 10 dari 100 data</p>
                            <ul id="tablePagination" class="pagination m-0 ms-auto">
                                <!-- Pagination will be dynamically generated -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('admin.hewan.modal.edit', [
        'statusTernak' => $status,
        'tipeTernak' => $tipe,
        'kesehatanTernak' => $kesehatan,
        'programTernak' => $program,
        'kandangTernak' => $kandang,
        'pemilikTernak' => $user,
        'hewanInduk' => $induk,
    ])
    @include('admin.hewan.modal.create', [
        'statusTernak' => $status,
        'tipeTernak' => $tipe,
        'kesehatanTernak' => $kesehatan,
        'programTernak' => $program,
        'kandangTernak' => $kandang,
        'pemilikTernak' => $user,
        'hewanInduk' => $induk,
    ]) --}}
    <script>
        $(document).ready(function() {
            $(document).on('click', '.delete', function() {
                const id = $(this).data('id');
                Swal.fire({
                    title: 'Anda yakin?',
                    text: 'Data akan dihapus secara permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Tidak, batal!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/admin/hewan/" + id,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Dihapus!',
                                    response.success || 'Data telah dihapus.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            },
                            error: function(err) {
                                Swal.fire(
                                    'Error!',
                                    'Terjadi kesalahan saat menghapus data.',
                                    'error'
                                );
                            }
                        });
                    } else {
                        Swal.fire(
                            'Cancelled',
                            'Data tidak dihapus.',
                            'info'
                        );
                    }
                });
            });
        });
    </script>
    <script>
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');

                // Lakukan fetch untuk mendapatkan data dari server
                fetch(`/admin/hewan/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        // Isi form di modal dengan data yang diambil
                        document.getElementById('editHewanForm').setAttribute('action',
                            `/admin/hewan/${id}`);
                        document.getElementById('edit-ternak-tag').value = data.ternak_tag;
                        document.getElementById('edit-ternak-induk').value = data.ternak_induk;
                        document.getElementById('edit-sex').value = data.sex;
                        document.getElementById('edit-tanggal-masuk').value = data.tanggal_masuk;
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                        alert('Terjadi kesalahan saat mengambil data.');
                    });
            });
        });
    </script>

    <script>
        // Enable or Disable Fields Before Submission
        document.getElementById('hewanForm').addEventListener('submit', function() {
            document.getElementById('ternak_tag').removeAttribute('readonly');
            document.getElementById('ternak_tag').removeAttribute('disabled');
        });
    </script>

</x-app>

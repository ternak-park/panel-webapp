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
                                {{-- gawe hapus all --}}
                                <button id="deleteSelected" class="btn btn-danger d-none d-sm-inline-block">
                                    Hapus
                                </button>
                                <a href="#" class="btn btn-primary d-none d-sm-inline-block"
                                    data-bs-toggle="modal" data-bs-target="#modal-import-csv">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-file-upload">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                        <path
                                            d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                        <path d="M12 11v6" />
                                        <path d="M9.5 13.5l2.5 -2.5l2.5 2.5" />
                                    </svg>
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
                <div class="row row-cards">
                    {{--  --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Hewan</h3>
                            </div>
                            <div class="card-body border-bottom py-3">
                                <div class="d-flex">
                                    <div class="text-muted">
                                        Menampilkan
                                        <div class="mx-2 d-inline-block">
                                            <select id="pageLength" class="form-control form-control-sm"
                                                style="width:70px">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                        hasil
                                    </div>
                                    <div class="ms-auto text-muted">
                                        Search:
                                        <div class="ms-2 d-inline-block">
                                            <input type="text" id="searchInput" class="form-control form-control-sm"
                                                placeholder="Cari Hewan" aria-label="Search supplier">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-vcenter table-striped card-table datatable" id="tableHewan">
                                    <thead>
                                        <tr>
                                            <th class="w-1">
                                                <input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select all items" />
                                            </th>
                                            <th class="w-1" style="width: 5%;">No</th>
                                            <th style="width: 15%;">Tag</th>
                                            <th style="width: 15%;">Sex</th>
                                            <th style="width: 15%;">Program</th>
                                            <th style="width: 15%;">Jenis</th>
                                            <th style="width: 15%;">Status</th>
                                            <th class="w-1" style="width: 20%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Your table content will be populated here -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <p id="tableInfo" class="m-0 text-muted"></p>
                                <ul id="tablePagination" class="pagination m-0 ms-auto"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.hewan.modal.import')
    @include('admin.hewan.modal.edit', [
        'statusTernak' => $status ?? [], 
        'tipeTernak' => $tipe ?? [],
        'kesehatanTernak' => $kesehatan ?? [],
        'programTernak' => $program ?? [],
        'kandangTernak' => $kandang ?? [],
        'pemilikTernak' => $user ?? [],
        'hewanInduk' => $induk ?? [],
        'jenis' => $jenis ?? [],
        'jenisTernak' => $jenisTernak ?? []
    ])
    @include('admin.hewan.modal.create', [
        'statusTernak' => $status ?? [],
        'tipeTernak' => $tipe ?? [],
        'kesehatanTernak' => $kesehatan ?? [],
        'programTernak' => $program ?? [],
        'kandangTernak' => $kandang ?? [],
        'pemilikTernak' => $user ?? [],
        'hewanInduk' => $induk ?? [],
        'jenis' => $jenis ?? [],
        'jenisTernak' => $jenisTernak ?? []
    ])
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
                fetch(`/admin/hewan/${id}/edit`)
                    .then(response => response.json())
                    .then(data => {
                        // Isi form di modal dengan data yang diambil
                        document.getElementById('editHewanForm').setAttribute('action',
                            `/admin/hewan/${id}`);
                        document.getElementById('edit-ternak-tag').value = data.tag_hewan || '';
                        
                        // Family Information
                        if (data.detail) {
                            document.getElementById('edit-ternak-induk-betina').value = data.detail.tag_induk_betina || '';
                            document.getElementById('edit-ternak-induk-jantan').value = data.detail.tag_induk_jantan || '';
                            document.getElementById('edit-ternak-tag-anak').value = data.detail.tag_anak || '';

                            // Set dropdown values
                            if (document.querySelector('select[name="ternak_jenis_indeks"]')) {
                                document.querySelector('select[name="ternak_jenis_indeks"]').value = data.detail.ternak_jenis || data.ternak_jenis_id || '';
                            }
                            if (document.querySelector('select[name="ternak_kandang_indeks"]')) {
                                document.querySelector('select[name="ternak_kandang_indeks"]').value = data.detail.ternak_kandang || '';
                            }
                            if (document.querySelector('select[name="pemilik_indeks"]')) {
                                document.querySelector('select[name="pemilik_indeks"]').value = data.detail.nama_pemilik || '';
                            }
                            if (document.querySelector('select[name="ternak_status_indeks"]')) {
                                document.querySelector('select[name="ternak_status_indeks"]').value = data.detail.ternak_status || '';
                            }
                            if (document.querySelector('select[name="ternak_kesehatan_indeks"]')) {
                                document.querySelector('select[name="ternak_kesehatan_indeks"]').value = data.detail.ternak_kesehatan || '';
                            }
                            if (document.querySelector('select[name="ternak_program_indeks"]')) {
                                document.querySelector('select[name="ternak_program_indeks"]').value = data.detail.ternak_program || '';
                            }

                            // Dates and measurements
                            document.getElementById('edit-tanggal-masuk').value = data.detail.tanggal_masuk || '';
                            if (document.getElementById('edit-tgl-terjual-mati')) {
                                document.getElementById('edit-tgl-terjual-mati').value = data.detail.tgl_terjual_mati || '';
                            }
                            if (document.getElementById('edit-ternak-usia')) {
                                document.getElementById('edit-ternak-usia').value = data.detail.ternak_usia || '';
                            }
                            if (document.getElementById('edit-lama-hari-dipeternakan')) {
                                document.getElementById('edit-lama-hari-dipeternakan').value = data.detail.lama_hari_dipeternakan || '';
                            }
                            if (document.getElementById('edit-bb-masuk-lahir')) {
                                document.getElementById('edit-bb-masuk-lahir').value = data.detail.bb_masuk_lahir || '';
                            }
                            if (document.getElementById('edit-bb-terbaru')) {
                                document.getElementById('edit-bb-terbaru').value = data.detail.bb_terbaru || '';
                            }
                            if (document.getElementById('edit-tgl-timbang-terbaru')) {
                                document.getElementById('edit-tgl-timbang-terbaru').value = data.detail.tgl_timbang_terbaru || '';
                            }
                        }

                        // Basic info
                        document.getElementById('edit-sex').value = data.sex_hewan || '';
                        if (document.querySelector('select[name="ternak_tipe_indeks"]')) {
                            document.querySelector('select[name="ternak_tipe_indeks"]').value = data.ternak_tipe || '';
                        }

                        // Refresh any TomSelect instances if they exist
                        if (window.tomSelectInstances) {
                            for (let key in window.tomSelectInstances) {
                                if (window.tomSelectInstances[key]) {
                                    window.tomSelectInstances[key].sync();
                                }
                            }
                        }
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
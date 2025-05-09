<x-app>
    <div class="page">
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Overview
                            </div>
                            <h2 class="page-title">
                                {{ $judul }}
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <span class="d-none d-sm-inline">
                                    <a href="#" class="btn">
                                        Cetak
                                    </a>
                                </span>
                                 {{-- gawe hapus all --}}
                                 <button id="deleteSelected" class="btn btn-danger d-none d-sm-inline-block">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 7l16 0" />
                                        <path d="M10 11l0 6" />
                                        <path d="M14 11l0 6" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg> --}}
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
                                <a href="{{ route('suppliers.create') }}"
                                    class="btn btn-primary d-none d-sm-inline-block">
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


            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $sub_judul }}</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    Menampilkan
                                    <div class="mx-2 d-inline-block">
                                        <select id="pageLength" class="form-control form-control-sm" style="width:70px">
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
                            <table class="table table-vcenter table-striped card-table datatable" id="tableKondisi">
                                <thead>
                                    <tr>
                                        <th class="w-1">
                                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                                aria-label="Select all items" />
                                        </th>
                                        <th class="w-1" style="width: 5%;">No</th>
                                        <th style="width: 30%;">Tag</th>
                                        <th style="width: 30%;">Kesehatan</th>
                                        <th style="width: 15%;">Status</th>
                                        <th class="w-1" style="width: 20%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Your table content will be populated here -->
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable" id="tableKondisi">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tag Hewan</th>
                                        <th>Kesehatan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div> --}}
                        <div class="card-footer d-flex align-items-center">
                            <p id="tableInfo" class="m-0 text-muted"></p>
                            <ul id="tablePagination" class="pagination m-0 ms-auto"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
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
                        url: "/admin/ternak-kondisi/" + id,
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
                                // Auto-refresh halaman setelah data dihapus
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
    </script>
</x-app>

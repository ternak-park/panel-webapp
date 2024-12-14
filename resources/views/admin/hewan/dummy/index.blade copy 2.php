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
                                    <a href="sad" class="btn">
                                        Cetak
                                    </a>
                                </span>
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
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body border-bottom py-3">
                                <div class="d-flex">
                                    <div class="text-muted">
                                        {{-- Show --}}
                                        <div class="mx-2 d-inline-block">
                                            <select id="pageLength" class="form-control form-control-sm"
                                                style="width:70px">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                        {{-- entries --}}
                                    </div>
                                    <div class="ms-auto text-muted">
                                        {{-- Search: --}}
                                        <div class="ms-2 d-inline-block">
                                            <input type="text" id="searchInput" class="form-control form-control-sm"
                                                placeholder="Cari Hewan" aria-label="Search supplier">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table" id="tableHewan">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">No</th>
                                            <th style="width: 15%;">Tag</th>
                                            <th style="width: 15%;">Jenis</th>
                                            <th style="width: 15%;">Sex</th>
                                            <th style="width: 25%;">Tipe</th>
                                            <th class="w-1" style="width: 30%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <p id="tableInfo" class="m-0 text-muted"></p>
                                <ul id="tablePagination" class="pagination m-0 ms-auto"></ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Tracker</h3>
                                <table class="table table-sm table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Sex</th>
                                            <th class="text-end">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tracker as $item)
                                            <tr>
                                                <td>
                                                    <div class="progressbg">
                                                        <div class="progress progressbg-progress">
                                                            @php
                                                                // Hitung persentase sex berdasarkan jumlah total hewan
                                                                $percentage =
                                                                    $total > 0 ? ($item->jumlah / $total) * 100 : 0;
                                                            @endphp
                                                            <div class="progress-bar bg-primary-lt"
                                                                style="width: {{ $percentage }}%" role="progressbar"
                                                                aria-valuenow="{{ $percentage }}" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                aria-label="{{ $percentage }}% Complete">
                                                                <span class="visually-hidden">{{ $percentage }}%
                                                                    Complete</span>
                                                            </div>
                                                        </div>
                                                        <div class="progressbg-text">
                                                            {{ $item->sex == 'Jantan' ? 'Jantan' : 'Betina' }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="w-1 fw-bold text-end">{{ $item->jumlah }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="text-center">Data tracker tidak tersedia
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                @include('admin.hewan.modal.create', [
                    'statusTernak' => $status,
                    'tipeTernak' => $tipe,
                    'kesehatanTernak' => $kesehatan,
                    'programTernak' => $program,
                    'kandangTernak' => $kandang,
                    'pemilikTernak' => $user,
                ])
                <script>
                    // Delete handler
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
                                    url: "/suppliers/" + id,
                                    type: 'DELETE',
                                    success: function(result) {
                                        Swal.fire(
                                            'Dihapus!',
                                            'Data telah dihapus.',
                                            'success'
                                        );
                                        table.ajax.reload();
                                    },
                                    error: function(err) {
                                        Swal.fire(
                                            'Error!',
                                            'There was an error deleting the supplier.',
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

<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    {{-- Show --}}
                                    <div class="mx-2 d-inline-block">
                                        <select id="pageLength" class="form-control form-control-sm" style="width:70px">
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
                                        <th>ID</th>
                                        <th>Tag</th>
                                        <th>Jenis</th>
                                        <th>Sex</th>
                                        <th>Aksi</th>
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
                                    <tr>
                                        <td>
                                            <div class="progressbg">
                                                <div class="progress progressbg-progress">
                                                    <div class="progress-bar bg-primary-lt" style="width: 82.54%" role="progressbar" aria-valuenow="82.54" aria-valuemin="0" aria-valuemax="100" aria-label="82.54% Complete">
                                                        <span class="visually-hidden">82.54% Complete</span>
                                                    </div>
                                                </div>
                                                <div class="progressbg-text">Jantan</div>
                                            </div>
                                        </td>
                                        <td class="w-1 fw-bold text-end">4896</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="progressbg">
                                                <div class="progress progressbg-progress">
                                                    <div class="progress-bar bg-primary-lt" style="width: 76.29%" role="progressbar" aria-valuenow="76.29" aria-valuemin="0" aria-valuemax="100" aria-label="76.29% Complete">
                                                        <span class="visually-hidden">76.29% Complete</span>
                                                    </div>
                                                </div>
                                                <div class="progressbg-text">Betina</div>
                                            </div>
                                        </td>
                                        <td class="w-1 fw-bold text-end">3652</td>
                                    </tr>
                               
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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

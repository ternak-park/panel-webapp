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
                                {{-- gawe hapus all --}}
                                <button id="deleteSelected" class="btn d-none d-sm-inline-block disabled">
                                    Hapus
                                </button>
                                <span class="d-none d-sm-inline">
                                    <a href="{{ route('fisik.excel') }}" class="btn">
                                        Cetak
                                    </a>
                                </span>
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
                                <a href="{{ route('fisik.create') }}" class="btn btn-primary d-none d-sm-inline-block"
                                    data-bs-toggle="modal" data-bs-target="#modal-tambah-fisik">
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body border-bottom py-3">
                                <div class="d-flex">
                                    <div class="text-muted">
                                        Menampilkan
                                        <div class="mx-2 d-inline-block">
                                            <input type="text" id="customPageLength"
                                                class="form-control form-control-sm" style="width:70px" value="10"
                                                min="1" max="1000">
                                        </div>
                                        hasil
                                    </div>
                                    <div class="ms-auto text-muted">
                                        Search:
                                        <div class="ms-2 d-inline-block">
                                            <input type="text" id="searchInput" class="form-control form-control-sm"
                                                placeholder="Cari Hewan" aria-label="Search hewan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-vcenter table-striped card-table datatable" id="tableFisik">
                                    <thead>
                                        <tr>
                                            <th class="w-1">
                                                <input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select all items" />
                                            </th>
                                            <th class="w-1">No</th>
                                            <th>Tag</th>
                                            <th>Tgl Masuk/Lahir</th>
                                            <th>BB Masuk/Lahir</th>
                                            <th>Tgl Terakhir Timbang</th>
                                            <th>BB Terakhir</th>
                                            <th>Kenaikan berat</th>
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
    @include('admin.fisik.modal.import')
@include('admin.fisik.modal.edit', [
    'statusTernak' => $status ?? [],
    'tipeTernak' => $tipe ?? [],
    'kesehatanTernak' => $kesehatan ?? [],
    'programTernak' => $program ?? [],
    'kandangTernak' => $kandang ?? [],
    'pemilikTernak' => $user ?? [],
    'hewanInduk' => $induk ?? [],
    'jenis' => $jenis ?? [],
    'jenisTernak' => $jenisTernak ?? [],
])
@include('admin.fisik.modal.create', [
    'statusTernak' => $status ?? [],
    'tipeTernak' => $tipe ?? [],
    'kesehatanTernak' => $kesehatan ?? [],
    'programTernak' => $program ?? [],
    'kandangTernak' => $kandang ?? [],
    'pemilikTernak' => $user ?? [],
    'hewanInduk' => $induk ?? [],
    'jenis' => $jenis ?? [],
    'jenisTernak' => $jenisTernak ?? [],
])

<script>
    $(document).ready(function() {
        // Initialize AJAX setup with CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Initialize DataTable instance - this references the main table functionality in fisik.js
        let tableFisik = TableUtils.initDataTable({
            tableId: 'tableFisik',
            ajaxUrl: '/admin/fisik',
            deleteUrl: '/admin/fisik/batch-delete',
            deleteButtonId: 'deleteSelected',
            columns: [{
                    // Checkbox column
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return '<input class="form-check-input item-checkbox m-0 align-middle" type="checkbox" aria-label="Select item" data-id="' + row.id + '" />';
                    },
                },
                {
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                    orderable: false,
                    searchable: false,
                },
                {
                    data: "tag_hewan",
                    name: "tag_hewan",
                    orderable: true
                },
                {
                    data: "tgl_masuk_lahir_fisik",
                    name: "tgl_masuk_lahir_fisik",
                    orderable: true
                },
                {
                    data: "berat_masuk_fisik",
                    name: "berat_masuk_fisik",
                    orderable: true
                },
                {
                    data: "tgl_timbang_terakhir_fisik",
                    name: "tgl_timbang_terakhir_fisik",
                    orderable: true
                },
                {
                    data: "berat_terakhir_fisik",
                    name: "berat_terakhir_fisik",
                    orderable: true
                },
                {
                    data: "kenaikan_berat_fisik",
                    name: "kenaikan_berat_fisik",
                    orderable: true,
                    render: function(data, type, row) {
                        if (data > 0) {
                            return `<span class="text-success">+${data}</span>`;
                        } else if (data < 0) {
                            return `<span class="text-danger">${data}</span>`;
                        } else {
                            return '<span>0</span>';
                        }
                    }
                },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false
                },
            ],
        });

        // Single item delete handler
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
                        url: "/admin/fisik/" + id,
                        type: 'DELETE',
                        success: function(response) {
                            Swal.fire(
                                'Dihapus!',
                                response.success || 'Data telah dihapus.',
                                'success'
                            ).then(() => {
                                // Refresh the table instead of full page reload
                                tableFisik.ajax.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'Terjadi kesalahan saat menghapus data: ' +
                                (xhr.responseJSON ? xhr.responseJSON.error : xhr.statusText),
                                'error'
                            );
                        }
                    });
                }
            });
        });

        // Edit button handler
        $(document).on('click', '.btn-edit', function() {
            const id = this.getAttribute('data-id');

            // Fetch data from server
            $.ajax({
                url: `/admin/fisik/${id}/edit`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Set form action path
                    $('#editFisikForm').attr('action', `/admin/fisik/${id}`);

                    // Fill the form with data
                    if (window.tomSelectInstances && window.tomSelectInstances['edit-select-labels-tag']) {
                        window.tomSelectInstances['edit-select-labels-tag'].setValue(data.ternak_tag_id || '');
                    } else {
                        $('#edit-ternak-tag').val(data.tag_hewan || '');
                        $('select[name="ternak_tag_id"]').val(data.ternak_tag_id || '');
                    }

                    // Set date and weight fields
                    $('#edit-tgl-masuk-lahir').val(data.tgl_masuk_lahir_fisik || '');
                    $('#edit-berat-masuk').val(data.berat_masuk_fisik || '');
                    $('#edit-tgl-timbang-terakhir').val(data.tgl_timbang_terakhir_fisik || '');
                    $('#edit-berat-terakhir').val(data.berat_terakhir_fisik || '');

                    // Calculate and display weight gain
                    const beratMasuk = parseFloat(data.berat_masuk_fisik) || 0;
                    const beratTerakhir = parseFloat(data.berat_terakhir_fisik) || 0;
                    const kenaikanBerat = beratTerakhir - beratMasuk;
                    $('#edit-kenaikan-berat').val(kenaikanBerat.toFixed(2));

                    // Refresh any select inputs that might use TomSelect
                    if (window.tomSelectInstances) {
                        for (let key in window.tomSelectInstances) {
                            if (window.tomSelectInstances[key]) {
                                window.tomSelectInstances[key].sync();
                            }
                        }
                    }

                    // Show the modal
                    $('#modal-edit').modal('show');
                },
                error: function(xhr) {
                    console.error('Error fetching data:', xhr);
                    Swal.fire({
                        icon: 'error',
                        title: 'Kesalahan',
                        text: 'Terjadi kesalahan saat mengambil data: ' +
                            (xhr.responseJSON ? xhr.responseJSON.message : xhr.statusText)
                    });
                }
            });
        });

        // Weight calculation for both Add and Edit forms
        function calculateWeightGain(formPrefix) {
            const beratMasuk = parseFloat($(`#${formPrefix}-berat-masuk`).val()) || 0;
            const beratTerakhir = parseFloat($(`#${formPrefix}-berat-terakhir`).val()) || 0;
            const kenaikanBerat = beratTerakhir - beratMasuk;
            $(`#${formPrefix}-kenaikan-berat`).val(kenaikanBerat.toFixed(2));
        }

        // Auto-calculate weight gain on input change
        $(document).on('input', '#edit-berat-masuk, #edit-berat-terakhir', function() {
            calculateWeightGain('edit');
        });

        $(document).on('input', '#add-berat-masuk, #add-berat-terakhir', function() {
            calculateWeightGain('add');
        });

        // Handle form submission for the edit form
        $('#editFisikForm').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const url = form.attr('action');
            const formData = form.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#modal-edit').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.message || 'Data berhasil diperbarui'
                    }).then(() => {
                        tableFisik.ajax.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Kesalahan',
                        text: 'Terjadi kesalahan saat memperbarui data: ' +
                            (xhr.responseJSON ? xhr.responseJSON.message : xhr.statusText)
                    });
                }
            });
        });

        // Handle form submission for the create form
        $('#createFisikForm').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const url = form.attr('action');
            const formData = form.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#modal-create').modal('hide');
                    form[0].reset();
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.message || 'Data berhasil ditambahkan'
                    }).then(() => {
                        tableFisik.ajax.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Kesalahan',
                        text: 'Terjadi kesalahan saat menambahkan data: ' +
                            (xhr.responseJSON ? xhr.responseJSON.message : xhr.statusText)
                    });
                }
            });
        });
    });
</script>

<!-- Enable or Disable Fields Before Submission -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('fisikForm')) {
            document.getElementById('fisikForm').addEventListener('submit', function() {
                document.getElementById('ternak_tag').removeAttribute('readonly');
                document.getElementById('ternak_tag').removeAttribute('disabled');
            });
        }
    });
</script>
</x-app>

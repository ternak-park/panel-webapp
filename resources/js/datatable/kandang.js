$(document).ready(() => {
  const $ = window.$ // Declare the $ variable
  const Swal = window.Swal // Declare the Swal variable

  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
  })

    // Initialize datatable ngawe table utils : public/assets/js/utils/table-utils.js
    let table = TableUtils.initDataTable({
        tableId: 'tableKandang',
        ajaxUrl: '/admin/kandang',
        deleteUrl: '/admin/kandang/batch-delete',
        deleteButtonId: 'deleteSelected',

        columns: [{
                // Checkbox column
                data: null,
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
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
                data: "kode_kandang",
                name: "kode_kandang",
                orderable: true
            },
            {
                data: "total_ternak",
                name: "ternak_detail_kandang.total_ternak",
                orderable: true
            },
            {
                data: "total_bb",
                name: "ternak_detail_kandang.total_bb",
                orderable: true
            },
            {
                data: "petugas_name",
                name: "petugas.nama_petugas",
                orderable: true
            },
            {
                data: "pemilik_name",
                name: "pemilik.nama_pemilik",
                orderable: true
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false
            },
        ],
    });

    /* gawe nge add indicator sortir kolom datatable */
    table.on('init', function () {
        table.columns().every(function (index) {
            let column = this;
            let columnDef = table.settings().init().columns[index];

            if (columnDef && columnDef.orderable !== false) {
                let header = $(column.header());
                if (!header.find(".sort-icon").length) {
                    header.append(' <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-muted sort-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline points="6 9 12 15 18 9" /></svg>');
                }
                // Set the cursor style to pointer
                header.css("cursor", "pointer");
            }
        });
    });

    /* event listener change direction */
    table.on("order.dt", function () {
        const orderInfo = table.order()[0];
        const columnIndex = orderInfo[0];
        const direction = orderInfo[1];
        /* reset all icon */
        $(".sort-icon").each(function () {
            $(this).html('<path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline points="6 9 12 15 18 9" /></svg>');
        });
        /* gawe update icon*/
        const sortedHeader = $(table.column(columnIndex).header());
        const sortIcon = sortedHeader.find(".sort-icon");

        if (direction === "asc") {
            sortIcon.html('<path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline points="6 15 12 9 18 15" /></svg>');
        } else {
            sortIcon.html('<path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline points="6 9 12 15 18 9" /></svg>');
        }
    });

    // Single item delete handler - we keep this in kandang.js as it's specific to this page
    $(document).on("click", ".delete", function () {
        const id = $(this).data("id");
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
                    url: "/admin/kandang/" + id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        Swal.fire(
                            'Dihapus!',
                            response.success || 'Data telah dihapus.',
                            'success'
                        ).then(() => {
                            // Refresh the table instead of full page reload
                            table.ajax.reload();
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error("Delete error:", xhr.responseText);
                        Swal.fire(
                            'Error!',
                            'Terjadi kesalahan saat menghapus data: ' +
                            (xhr.responseJSON ? xhr.responseJSON.error : error),
                            'error'
                        );
                    }
                });
            }
        });
    });
});

/* -------------------- EDIT MODAL HANDLER GAWE EDIT MODAL ----------------------- */
$(document).on("click", ".btn-edit", function () {
    const id = $(this).data("id");

    // Fetch kandang data
    $.ajax({
        url: `/admin/kandang/${id}/edit`,
        method: "GET",
        dataType: "json",
        success: function (data) {
            console.log('Edit data:', data); // For debugging

            // Set form action
            $("#editKandangForm").attr("action", `/admin/kandang/${id}`);

            // Basic Information
            $("#edit-kode-kandang").val(data.kode_kandang || '');
            $("#edit-total-ternak-kandang").val(data.total_ternak_kandang || '');

            // Set values for TomSelect or standard select elements
            setSelectOrTomSelectValue('edit-select-labels-pemilik', data.nama_pemilik_id || '');

            // Detail Information
            if (data.detail) {
                $("#edit-total-ternak").val(data.detail.total_ternak || '0');
                $("#edit-total-bb").val(data.detail.total_bb || '0');
                setSelectOrTomSelectValue('edit-select-labels-petugas', data.detail.nama_petugas_id || '');
            }

            // Show modal
            $("#modal-edit-kandang").modal("show");
        },
        error: function (xhr) {
            console.error('Edit error:', xhr);
            Swal.fire({
                icon: "error",
                title: "Kesalahan",
                text: "Terjadi kesalahan saat mengambil data kandang: " +
                    (xhr.responseJSON ? xhr.responseJSON.message : xhr.statusText)
            });
        },
    });
});

// Helper function to handle both TomSelect and standard selects
function setSelectOrTomSelectValue(selectId, value) {
    // Check if TomSelect is being used and if the instance exists
    if (window.tomSelectInstances && window.tomSelectInstances[selectId]) {
        const tomSelect = window.tomSelectInstances[selectId];
        tomSelect.clear();
        if (value) {
            try {
                tomSelect.setValue(value);
            } catch (e) {
                console.warn(`Error setting TomSelect value for ${selectId}:`, e);
            }
        }
    } else {
        // Use standard DOM select
        const select = document.getElementById(selectId);
        if (select) {
            select.value = value || '';
        }
    }
}

// Form submission handling
$(document).ready(function () {
    // Create form submission
    $('#addKandangForm').on('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    // Close modal
                    $('#modal-tambah-kandang').modal('hide');

                    // Show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.message || 'Data kandang berhasil ditambahkan'
                    }).then(() => {
                        // Refresh datatable
                        $('#tableKandang').DataTable().ajax.reload();

                        // Reset form
                        $('#addKandangForm')[0].reset();

                        // Reset TomSelect instances if any
                        if (window.tomSelectInstances) {
                            Object.keys(window.tomSelectInstances).forEach(key => {
                                if (key.startsWith('select-labels')) {
                                    window.tomSelectInstances[key].clear();
                                }
                            });
                        }
                    });
                }
            },
            error: function (xhr) {
                console.error('Add error:', xhr);

                let errorMessage = 'Terjadi kesalahan saat menyimpan data';

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    const errors = xhr.responseJSON.errors;
                    errorMessage = Object.values(errors).flat().join('<br>');
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Kesalahan',
                    html: errorMessage
                });
            }
        });
    });

    // Edit form submission
    $('#editKandangForm').on('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        formData.append('_method', 'PUT'); // For method spoofing

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    // Close modal
                    $('#modal-edit-kandang').modal('hide');

                    // Show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.message || 'Data kandang berhasil diperbarui'
                    }).then(() => {
                        // Refresh datatable
                        $('#tableKandang').DataTable().ajax.reload();
                    });
                }
            },
            error: function (xhr) {
                console.error('Edit error:', xhr);

                let errorMessage = 'Terjadi kesalahan saat memperbarui data';

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    const errors = xhr.responseJSON.errors;
                    errorMessage = Object.values(errors).flat().join('<br>');
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Kesalahan',
                    html: errorMessage
                });
            }
        });
    });
});

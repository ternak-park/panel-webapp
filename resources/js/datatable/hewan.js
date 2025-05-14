$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Initialize datatable ngawe table utils : public/assets/js/utils/table-utils.js
    let table = TableUtils.initDataTable({
        tableId: 'tableHewan',
        ajaxUrl: '/admin/hewan',
        deleteUrl: '/admin/hewan/batch-delete',
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
                data: "tag_hewan",
                name: "tag_hewan",
                orderable: true
            },
            {
                data: "sex_hewan",
                name: "sex_hewan",
                orderable: true
            },
            {
                data: "program",
                orderable: true,
                render: function (data, type, row) {
                    if (!data) return 'Tidak tersedia';

                    // Format teks (kapital huruf pertama)
                    const text = data.charAt(0).toUpperCase() + data.slice(1);

                    // Generate consistent color based on program value
                    const colorClasses = [
                        'bg-blue', 'bg-green', 'bg-yellow', 'bg-red',
                        'bg-purple', 'bg-pink', 'bg-orange', 'bg-cyan'
                    ];

                    // Simple hash function to convert string to number
                    let hash = 0;
                    for (let i = 0; i < data.length; i++) {
                        hash = data.charCodeAt(i) + ((hash << 5) - hash);
                    }

                    // Get color index from hash
                    const colorIndex = Math.abs(hash) % colorClasses.length;
                    const badgeClass = colorClasses[colorIndex];

                    return `<span class="badge ${badgeClass}">${text}</span>`;
                },
            },
            {
                data: "jenis",
                name: "jenis.nama_jenis",
                orderable: true
            },
            {
                data: "status",
                name: "status.nama_status",
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

    // Single item delete handler - we keep this in hewan.js as it's specific to this page
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
                    url: "/admin/hewan/" + id,
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

    // Fetch animal data
    $.ajax({
        url: `/admin/hewan/${id}/edit`,
        method: "GET",
        dataType: "json",
        success: function (data) {
            console.log('Edit data:', data); // For debugging

            // Basic Information
            $("#edit-ternak-tag").val(data.tag_hewan || '');
            $("#edit-sex").val(data.sex_hewan || '');
            $('select[name="ternak_jenis_indeks"]').val(data.ternak_jenis_id || '');

            // Family Information
            if (data.detail) {
                $("#edit-ternak-induk-betina").val(data.detail.tag_induk_betina || '');
                $("#edit-ternak-induk-jantan").val(data.detail.tag_induk_jantan || '');
                $("#edit-ternak-tag-anak").val(data.detail.tag_anak || '');

                // Kandang dan Ownership
                $('select[name="ternak_kandang_indeks"]').val(data.detail.ternak_kandang || '');
                $('select[name="pemilik_indeks"]').val(data.detail.nama_pemilik || '');

                // Status, Program, etc.
                $('select[name="ternak_status_indeks"]').val(data.detail.ternak_status || '');
                $('select[name="ternak_kesehatan_indeks"]').val(data.detail.ternak_kesehatan || '');
                $('select[name="ternak_program_indeks"]').val(data.detail.ternak_program || '');

                // Date and Time Information
                $("#edit-tanggal-masuk").val(data.detail.tanggal_masuk || '');
                $("#edit-tgl-terjual-mati").val(data.detail.tgl_terjual_mati || '');
                $("#edit-ternak-usia").val(data.detail.ternak_usia || '');
                $("#edit-lama-hari-dipeternakan").val(data.detail.lama_hari_dipeternakan || '');

                // Weight Information
                $("#edit-bb-masuk-lahir").val(data.detail.bb_masuk_lahir || '');
                $("#edit-bb-terbaru").val(data.detail.bb_terbaru || '');
                $("#edit-tgl-timbang-terbaru").val(data.detail.tgl_timbang_terbaru || '');
            }

            // Set ternak_tipe if available
            $('select[name="ternak_tipe_indeks"]').val(data.ternak_tipe || '');

            // Set form action
            $("#editHewanForm").attr("action", `/admin/hewan/${id}`);

            // Refresh Tom Select instances to update the UI
            if (window.tomSelectInstances) {
                Object.values(window.tomSelectInstances).forEach(select => {
                    select.sync();
                });
            }

            // Show modal
            $("#modal-edit").modal("show");
        },
        error: function (xhr) {
            console.error('Edit error:', xhr);
            Swal.fire({
                icon: "error",
                title: "Kesalahan",
                text: "Terjadi kesalahan saat mengambil data hewan: " + (xhr.responseJSON ? xhr.responseJSON.message : xhr.statusText)
            });
        },
    });
});

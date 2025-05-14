$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var hewanShowUrl = "/admin/hewan/{id}/show";

    // Updated DataTable initialization for hewan.js

    let table = $("#tableHewan").DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        pageLength: 10,
        dom: "t", // Only show the table
        classes: {
            sTable: "table table-vcenter table-striped card-table",
            sWrapper: "table-responsive",
        },
        language: {
            lengthMenu: "",
            info: "",
            infoFiltered: "(disaring dari total _MAX_ data)",
            emptyTable: "Tidak ada data",
            infoEmpty: "Menampilkan 0 data",
            zeroRecords: "Data tidak ditemukan",
            pagingType: "simple",
            paginate: {
                previous: '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M15 6l-6 6l6 6" /></svg> prev',
                next: 'next <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M9 6l6 6l-6 6" /></svg>',
            },
            processing: "Loading...",
        },
        ajax: {
            url: "/admin/hewan",
            error: function (xhr, error, thrown) {
                console.error('DataTables error:', error, thrown);
                // Display a user-friendly error message
                $('#tableHewan tbody').html('<tr><td colspan="8" class="text-center">Error loading data. Please refresh the page or contact administrator.</td></tr>');
            }
        },
        orderCellsTop: true,
        columnDefs: [{
                orderable: false,
                targets: [0, 1, 7]
            },
            {
                orderable: true,
                targets: [2, 3, 4, 5, 6],
                className: "sortable-column",
            },
        ],
        columns: [{
                // Checkbox column
                data: null,
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    return '<input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select item" />';
                },
            },
            {
                // Number column
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            {
                // Tag column - now using tag_hewan field from controller
                data: "tag_hewan",
                name: "tag_hewan",
                orderable: true
            },
            {
                // Sex column - using ternak_sex from DetailTernakHewan
                data: "sex_hewan",
                name: "ternak_sex",
                orderable: true
            },
            {
                // Program column - using relationship data
                data: "program",
                name: "program",
                orderable: true
            },
            {
                // Jenis column - using relationship data
                data: "jenis",
                name: "jenis",
                orderable: true
            },
            {
                // Status column - using relationship data
                data: "status",
                name: "status",
                orderable: true
            },
            {
                // Action column
                data: "action",
                name: "action",
                orderable: false,
                searchable: false
            },
        ],
        drawCallback: sihubDrawCallback,
        initComplete: function () {
            // Add sort indicators to the orderable columns
            this.api().columns().every(function (index) {
                let column = this;
                let columnDef = table.settings().init().columns[index];

                if (columnDef && columnDef.orderable !== false) {
                    let header = $(column.header());

                    // Add Tabler.io sort icon using SVG format
                    if (!header.find(".sort-icon").length) {
                        header.append(' <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-muted sort-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline points="6 9 12 15 18 9" /></svg>');
                    }

                    // Set the cursor style to pointer
                    header.css("cursor", "pointer");
                }
            });

            // Add event listener for sort direction change
            this.api().on("order.dt", function () {
                const orderInfo = table.order()[0];
                const columnIndex = orderInfo[0];
                const direction = orderInfo[1];

                // Reset all icons first
                $(".sort-icon").each(function () {
                    $(this).html('<path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline points="6 9 12 15 18 9" /></svg>');
                });

                // Update the icon for the sorted column
                const sortedHeader = $(table.column(columnIndex).header());
                const sortIcon = sortedHeader.find(".sort-icon");

                if (direction === "asc") {
                    sortIcon.html('<path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline points="6 15 12 9 18 15" /></svg>');
                } else {
                    sortIcon.html('<path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline points="6 9 12 15 18 9" /></svg>');
                }
            });
        }
    });

    // Select all checkbox
    $('thead input[type="checkbox"]').on("change", function () {
        var isChecked = this.checked;
        table
            .rows()
            .nodes()
            .to$()
            .find('input[type="checkbox"]')
            .prop("checked", isChecked);
    });

    // Page Length handler
    $("#pageLength").on("change", function () {
        table.page.len($(this).val()).draw();
    });

    // Custom search
    $("#searchInput").on("keyup", function () {
        table.search($(this).val()).draw();
    });

    // Custom pagination
    $(document).on("click", "#tablePagination .page-link", function (e) {
        e.preventDefault();
        if (!$(this).closest("li").hasClass("disabled")) {
            table.page($(this).data("page")).draw("page");
        }
    });

    // Delete selected button
    $("#deleteSelected").on("click", function () {
        var selectedIds = [];

        // Get all checkboxes that are checked (exclude the header checkbox)
        table
            .rows()
            .nodes()
            .to$()
            .find('input[type="checkbox"]:checked')
            .each(function () {
                var rowData = table.row($(this).closest('tr')).data();
                if (rowData && rowData.id) {
                    selectedIds.push(rowData.id);
                }
            });

        if (selectedIds.length === 0) {
            Swal.fire({
                title: "Perhatian",
                text: "Tidak ada data yang dipilih",
                icon: "warning",
            });
            return;
        }

        Swal.fire({
            title: "Anda yakin?",
            text: "Semua data yang dipilih akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Tidak, batal!",
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/admin/hewan/batch-delete",
                    type: "POST",
                    data: {
                        ids: selectedIds
                    },
                    success: function (response) {
                        Swal.fire(
                            "Dihapus!",
                            response.success || "Data telah dihapus.",
                            "success"
                        ).then(() => {
                            // Refresh the table
                            table.ajax.reload();

                            // Reset the "select all" checkbox
                            $('thead input[type="checkbox"]').prop('checked', false);
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error("Delete error:", xhr.responseText);
                        Swal.fire(
                            "Error!",
                            "Terjadi kesalahan saat menghapus data: " +
                            (xhr.responseJSON ? xhr.responseJSON.error : error),
                            "error"
                        );
                    },
                });
            }
        });
    });
});

// Updated Edit Modal Handler in hewan.js

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

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var hewanShowUrl = "/admin/hewan/{id}/show";

    let table = $("#tableHewan").DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        pageLength: 10,
        dom: "t", //
        language: {
            lengthMenu: "",
            info: "",
            infoFiltered: "(disaring dari total _MAX_ data)",
            emptyTable: "Tidak ada data",
            infoEmpty: "Menampilkan 0 data",
            zeroRecords: "Data tidak ditemukan",
            pagingType: "simple",
            paginate: {
                previous: "",
                next: "",
            },
            processing: "Loading...",
        },
        ajax: "/admin/hewan",
        columns: [
            {
                // gawe checklist e
                data: null,
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    return '<input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select item" />';
                },
            },
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            { data: "tag" },
            {
                data: "sex",
                render: function (data, type, row) {
                    return data
                        ? data.charAt(0).toUpperCase() + data.slice(1)
                        : data;
                },
            },
            {
                data: "ternak_program",
                render: function (data, type, row) {
                    return data
                        ? data.charAt(0).toUpperCase() + data.slice(1)
                        : data;
                },
            },
            {
                data: "jenis",
                render: function (data, type, row) {
                    return data ? data : "Tidak tersedia";
                },
            },
            {
                data: "ternak_tipe",
                render: function (data, type, row) {
                    return data ? data : "Tidak tersedia";
                },
            },
            { data: "action", orderable: false, searchable: false },
        ],
        drawCallback: sihubDrawCallback, // Make sure this function exists
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
});

$(document).ready(function () {
    // Edit Modal Handler
    $(document).on("click", ".btn-edit", function () {
        const id = $(this).data("id");

        // Fetch animal data
        $.ajax({
            url: `/admin/hewan/${id}/edit`,
            method: "GET",
            dataType: "json",
            success: function (data) {
                // Populate form fields
                $("#edit-ternak-tag").val(data.tag);
                $("#edit-ternak-induk").val(
                    data.detail ? data.detail.ternak_induk : ""
                );
                $("#edit-sex").val(data.sex);
                $("#edit-tanggal-masuk").val(
                    data.detail ? data.detail.tanggal_masuk : ""
                );

                // Dropdowns
                $('select[name="ternak_status_indeks"]').val(
                    data.detail ? data.detail.ternak_status : ""
                );
                $('select[name="ternak_tipe_indeks"]').val(data.ternak_tipe);
                $('select[name="ternak_kesehatan_indeks"]').val(
                    data.detail ? data.detail.ternak_kesehatan : ""
                );
                $('select[name="ternak_program_indeks"]').val(
                    data.detail ? data.detail.ternak_program : ""
                );
                $('select[name="ternak_kandang_indeks"]').val(
                    data.detail ? data.detail.ternak_kandang : ""
                );
                $('select[name="pemilik_indeks"]').val(
                    data.detail ? data.detail.pemilik : ""
                );

                // Set form action
                $("#editHewanForm").attr("action", `/admin/hewan/${id}`);

                // Show modal
                $("#modal-edit").modal("show");
            },
            error: function (xhr) {
                Swal.fire({
                    icon: "error",
                    title: "Kesalahan",
                    text: "Terjadi kesalahan saat mengambil data hewan.",
                });
            },
        });
    });

    // Form submission handler
    $("#editHewanForm").on("submit", function (e) {
        e.preventDefault();

        const form = $(this);
        const url = form.attr("action");
        const formData = form.serialize();

        $.ajax({
            url: url,
            method: "POST",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: response.message,
                    }).then(() => {
                        // Refresh DataTable
                        location.reload();
                        $("#tableHewan").DataTable().ajax.reload();

                        // Close modal
                        $("#modal-edit").modal("hide");
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Kesalahan",
                        text: response.message,
                    });
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    // Validation errors
                    const errors = xhr.responseJSON.errors;
                    let errorMessage = "";

                    if (errors) {
                        Object.values(errors).forEach((error) => {
                            errorMessage += error[0] + "\n";
                        });
                    }

                    Swal.fire({
                        icon: "error",
                        title: "Validasi Kesalahan",
                        text: errorMessage,
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Kesalahan",
                        text: "Terjadi kesalahan saat memperbarui data.",
                    });
                }
            },
        });
    });

    $(document).ready(function () {
        // Initial state check
        updateDeleteButtonState();

        // Toggle select all checkbox
        $('thead input[type="checkbox"]').on("change", function () {
            const isChecked = $(this).prop("checked");
            $('#tableHewan tbody input[type="checkbox"]').prop(
                "checked",
                isChecked
            );

            // The key fix: directly check how many rows we have in the table
            const rowCount = $("#tableHewan tbody tr").length;

            // Enable the button if we checked "all" and have multiple rows
            if (isChecked && rowCount > 1) {
                $("#deleteSelected").prop("disabled", false);
                $("#deleteSelected").removeClass("disabled");
            } else if (!isChecked) {
                // Disable the button when unchecking "all"
                $("#deleteSelected").prop("disabled", true);
                $("#deleteSelected").addClass("disabled");
            }
        });

        // Individual checkbox change
        $(document).on(
            "change",
            '#tableHewan tbody input[type="checkbox"]',
            function () {
                updateDeleteButtonState();
            }
        );

        // Helper function to update delete button state
        function updateDeleteButtonState() {
            const checkedCount = $(
                '#tableHewan tbody input[type="checkbox"]:checked'
            ).length;

            // Enable button only if MORE THAN ONE item is checked
            if (checkedCount > 1) {
                $("#deleteSelected").prop("disabled", false);
                $("#deleteSelected").removeClass("disabled");
            } else {
                $("#deleteSelected").prop("disabled", true);
                $("#deleteSelected").addClass("disabled");
            }
        }
        // Handle Delete Selected button click
        $(document).ready(function () {
            // Initial setup for button state
            $("#deleteSelected").prop("disabled", true).addClass("disabled");

            // Toggle select all checkbox
            $('thead input[type="checkbox"]').on("change", function () {
                const isChecked = $(this).prop("checked");
                $('#tableHewan tbody input[type="checkbox"]').prop(
                    "checked",
                    isChecked
                );
                updateDeleteButtonState();
            });

            // Individual checkbox change
            $(document).on(
                "change",
                '#tableHewan tbody input[type="checkbox"]',
                function () {
                    updateDeleteButtonState();
                }
            );

            // Helper function to update delete button state
            function updateDeleteButtonState() {
                const checkedCount = $(
                    '#tableHewan tbody input[type="checkbox"]:checked'
                ).length;

                if (checkedCount > 0) {
                    $("#deleteSelected")
                        .prop("disabled", false)
                        .removeClass("disabled");
                } else {
                    $("#deleteSelected")
                        .prop("disabled", true)
                        .addClass("disabled");
                }
            }

            // Handle Delete Selected button click
            $("#deleteSelected").on("click", function () {
                const selectedRows = [];

                // Debug logging
                console.log("Delete button clicked");

                // Get row data directly from the DataTable API
                const table = $("#tableHewan").DataTable();

                // Find checked checkboxes and get their row data
                $('#tableHewan tbody input[type="checkbox"]:checked').each(
                    function () {
                        const rowIdx = $(this).closest("tr").index();
                        const rowData = table.row(rowIdx).data();

                        if (rowData && rowData.id) {
                            selectedRows.push(rowData.id);
                            console.log("Added ID to selection:", rowData.id);
                        }
                    }
                );

                console.log("Selected IDs:", selectedRows);

                if (selectedRows.length === 0) {
                    Swal.fire({
                        title: "Peringatan",
                        text: "Tidak ada data yang dipilih!",
                        icon: "warning",
                    });
                    return;
                }

                Swal.fire({
                    title: "Anda yakin?",
                    text: `${selectedRows.length} data akan dihapus secara permanen!`,
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
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                            data: {
                                ids: selectedRows,
                            },
                            success: function (response) {
                                Swal.fire(
                                    "Dihapus!",
                                    response.success ||
                                        "Data terpilih telah dihapus.",
                                    "success"
                                ).then(() => {
                                    // Refresh the table
                                    $("#tableHewan").DataTable().ajax.reload();
                                });
                            },
                            error: function (err) {
                                console.error("Delete error:", err);
                                Swal.fire(
                                    "Error!",
                                    "Terjadi kesalahan saat menghapus data.",
                                    "error"
                                );
                            },
                        });
                    }
                });
            });
        });
    });
});
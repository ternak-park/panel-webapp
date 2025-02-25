$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    let table = $("#tableKandang").DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        // scrollX: true,
        responsive: true,
        pageLength: 10,
        dom: "t", // Remove default search and pagination
        language: {
            lengthMenu: "",
            info: "",
            infoFiltered: "(disaring dari total _MAX_ data)",
            emptyTable: "Tidak ada data",
            infoEmpty: "Menampilkan 0 data",
            zeroRecords: "Data tidak ditemukan",
            pagingType: "simple",
            paginate: {
                previous: "", // Menghilangkan teks "Previous"
                next: "", // Menghilangkan teks "Next"
            },
            processing: "Loading...", // Custom processing message
        },
        ajax: "/admin/kandang",
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
            { data: "kode_kandang" },
            { data: "hewan.tag" },
            // { data: "hewan.sex" },
            { data: "jenisDomba.nama_tipe", orderable: true, searchable: true },
            {
                data: "beratDomba.berat_terakhir",
                orderable: true,
                searchable: true,
            },
            {
                data: "kondisiDomba.nama_kesehatan",
                orderable: true,
                searchable: true,
            },
            {
                data: "kandang.petugas.nama_petugas",
                orderable: true,
                searchable: true,
            },
            {
                data: "action",
                orderable: false,
                searchable: false,
            },
        ],
        drawCallback: sihubDrawCallback,
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

    $("#pageLength").on("change", function () {
        table.page.len($(this).val()).draw();
    });

    $("#searchInput").on("keyup", function () {
        table.search($(this).val()).draw();
    });

    $(document).on("click", "#tablePagination .page-link", function (e) {
        e.preventDefault();
        if (!$(this).closest("li").hasClass("disabled")) {
            table.page($(this).data("page")).draw("page");
        }
    });

    
    $(document).ready(function () {
        // Initial state check
        updateDeleteButtonState();

        // Toggle select all checkbox
        $('thead input[type="checkbox"]').on("change", function () {
            const isChecked = $(this).prop("checked");
            $('#tableKandang tbody input[type="checkbox"]').prop(
                "checked",
                isChecked
            );
            updateDeleteButtonState();
        });

        // Individual checkbox change
        $(document).on(
            "change",
            '#tableKandang tbody input[type="checkbox"]',
            function () {
                updateDeleteButtonState();
            }
        );

        // Helper function to update delete button state
        function updateDeleteButtonState() {
            const checkedCount = $(
                '#tableKandang tbody input[type="checkbox"]:checked'
            ).length;

            // Disable button if exactly one or zero items are checked
            if (checkedCount <= 1) {
                $("#deleteSelected").prop("disabled", true);
                $("#deleteSelected").addClass("disabled");
            } else {
                $("#deleteSelected").prop("disabled", false);
                $("#deleteSelected").removeClass("disabled");
            }
        }

        // Handle Delete Selected button click
        $("#deleteSelected").on("click", function () {
            const selectedRows = [];

            // Get all checked rows
            $('#tableKandang tbody input[type="checkbox"]:checked').each(
                function () {
                    const id = $(this).closest("tr").find(".delete").data("id");
                    if (id) {
                        selectedRows.push(id);
                    }
                }
            );

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
                        url: "/admin/hewan/batch-delete", // Hard-coded URL instead of Blade template
                        type: "POST",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
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
                                // Refresh the table instead of reloading the page
                                $("#tableKandang").DataTable().ajax.reload();
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

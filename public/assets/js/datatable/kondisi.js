$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var supplierShowUrl = "/admin/ternak-kondisi/{id}/show";

    let table = $("#tableKondisi").DataTable({
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
                previous: "", // Menghilangkan teks "Previous"
                next: "", // Menghilangkan teks "Next"
            },
            processing: "Loading...", // Custom processing message
        },
        ajax: "/admin/ternak-kondisi",
        columns: [
            {
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
            {
                data: "ternak_tag",
                render: function (data, type, row) {
                    return data ? data : "Tidak tersedia";
                },
            },
            {
                data: "ternak_kesehatan",
                render: function (data, type, row) {
                    return row.kesehatan
                        ? row.kesehatan.nama_kesehatan
                        : "Tidak tersedia";
                },
            },
            {
                data: "ternak_status",
                render: function (data, type, row) {
                    return row.status
                        ? row.status.nama_status
                        : "Tidak tersedia";
                },
            },
            { data: "action", orderable: false, searchable: false },
        ],
        drawCallback: sihubDrawCallback, // Gawe Nyelok Callback
        initComplete: function () {
            // Add sort indicators to the orderable columns
            this.api()
                .columns()
                .every(function (index) {
                    let column = this;
                    let columnDef = table.settings().init().columns[index];

                    if (columnDef && columnDef.orderable !== false) {
                        let header = $(column.header());

                        // Add Tabler.io sort icon - using their SVG format
                        if (!header.find(".sort-icon").length) {
                            header.append(
                                ' <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-muted sort-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline points="6 9 12 15 18 9" /></svg>'
                            );
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
                    $(this).html(
                        '<path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline points="6 9 12 15 18 9" /></svg>'
                    );
                });

                // Update the icon for the sorted column
                const sortedHeader = $(table.column(columnIndex).header());
                const sortIcon = sortedHeader.find(".sort-icon");

                if (direction === "asc") {
                    sortIcon.html(
                        '<path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline points="6 15 12 9 18 15" /></svg>'
                    );
                } else {
                    sortIcon.html(
                        '<path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline points="6 9 12 15 18 9" /></svg>'
                    );
                }
            });
        },
    });
    $('thead input[type="checkbox"]').on("change", function () {
        var isChecked = this.checked;
        table
            .rows()
            .nodes()
            .to$()
            .find('input[type="checkbox"]')
            .prop("checked", isChecked);
    });
    // Gawe Page Length
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

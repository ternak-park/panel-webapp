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
        scrollX: true,
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
        ajax: "/admin/ternak-kondisi",
        columns: [
            { data: "id" },
            {
                data: "ternak_tag",
                render: function (data, type, row) {
                    return data ? data : "Tidak tersedia";
                },
            },
            {
                data: "ternak_kesehatan", 
                render: function (data, type, row) {
                    return row.kesehatan ? row.kesehatan.nama_kesehatan : "Tidak tersedia";
                },
            },
            {
                data: "ternak_status",
                render: function (data, type, row) {
                    return row.status ? row.status.nama_status : "Tidak tersedia";
                },
            },
            { data: "action", orderable: false, searchable: false },
        ],
        drawCallback: sihubDrawCallback, // Gawe Nyelok Callback
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

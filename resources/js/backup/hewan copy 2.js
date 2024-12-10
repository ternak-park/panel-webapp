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
        ajax: "/admin/hewan",
        columns: [
            {
                data: "id",
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                },
                orderable: false,
                searchable: false,
            },
            // {
            //     data: "id",
            //     render: function (data, type, row) {
            //         // Mengganti {id} dengan ID yang sesuai
            //         var showUrl = hewanShowUrl.replace("{id}", data);
            //         return `<a href="${showUrl}" class="view btn btn-primary btn-sm" style="width: 30px; font-size: 12px; padding: 5px;"><i class="fa-solid fa-eye"></i></a>`;
            //     },
            //     orderable: false,
            //     searchable: false,
            // },
            { data: "tag", visible: false },
            // gambar produk
            {
                data: null,
                render: function(data, type, row) {
                    // Menggabungkan gambar_hewan dan kode_produk dalam satu kolom
                    return '<td data-label="Name"><div class="d-flex py-1 align-items-center"><span class="avatar me-2" style="background-image: url(/storage/hewan/' + data.gambar_hewan + ')"></span><div class="flex-fill"><div class="font-weight-medium">' + data.jenis + '</div><div class="text-muted"><a href="#" class="text-reset">' + data.tag + '</a></div></div></div></td>';
                }
            },
            {
                data: "jenis", visible: false,
                render: function (data, type, row) {
                    return data ? data : "Tidak tersedia"; // Menampilkan nama tipe
                },
            },
            {
                data: "sex",
                render: function (data, type, row) {
                    // Kapital awal huruf
                    return data
                        ? data.charAt(0).toUpperCase() + data.slice(1)
                        : data;
                },
            },
            {
                data: "ternak_tipe",
                render: function (data, type, row) {
                    return data ? data : "Tidak tersedia"; // Menampilkan nama tipe
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

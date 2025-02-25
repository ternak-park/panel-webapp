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
                data: null,
                render: (data, type, row, meta) => meta.row + 1,
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
});

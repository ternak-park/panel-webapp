$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var supplierShowUrl = "/admin/suppliers/{id}/show";

    let table = $("#tableSupplier").DataTable({
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
        ajax: "/admin/suppliers",
        columns: [
            // {
            //     data: "id",
            //     render: function (data, type, row) {
            //         // Mengganti {id} dengan ID yang sesuai
            //         var showUrl = supplierShowUrl.replace("{id}", data);
            //         // return `<a href="${showUrl}" class="view btn btn-primary btn-sm" style="width: 30px; font-size: 12px; padding: 5px;"><i class="fa-solid fa-eye"></i></a>`;
            //         return `<a href="${showUrl}" class="view btn btn-outline-primary btn-sm" style="width: 30px; font-size: 12px; padding: 5px;"><i class="fa-solid fa-eye"></i></a>`;
    
            //     },
            //     orderable: false,
            //     searchable: false,
            // },
            {
                data: "id",
                render: function (data, type, row, meta) {
          
                    return meta.row + 1;  
                },
                orderable: false,
                searchable: false,
            },
            {
                data: "kode",
                render: function (data, type, row) {
                    return `
                        <div class="input-icon">
                                 <input type="text" value="${data}" class="form-control" placeholder="Search…" readonly style="width: 80px; font-size: 12px; padding: 5px;">
                       
                        </div>
                    `;
                },
                orderable: true,
                searchable: true,
            },
            { data: "jenis_pakan" },
            { data: "nama" },
            { data: "harga_per_kg" },
            // { data: "alamat" },
            // { data: "telepon" },
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

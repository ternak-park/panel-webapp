$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var supplierShowUrl = "/admin/ternak-reproduksi/{id}/show";

    let table = $("#tableReproduksi").DataTable({
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
        ajax: "/admin/ternak-reproduksi",
        columns: [
            { data: "id" },
            {
                data: "ternak_tag",
                render: function (data, type, row) {
                    // Kapital awal huruf
                    return data
                        ? data.charAt(0).toUpperCase() + data.slice(1)
                        : data;
                },
            },
            { data: "tanggal_birahi",
                render: function(data, type, row) {
                    if (!data) return data;
                    
                    // Months in Indonesian
                    const months = [
                        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                    ];
                    
                    const date = new Date(data);
                    const day = date.getDate().toString().padStart(2, '0');
                    const month = months[date.getMonth()];
                    const year = date.getFullYear();
                    
                    return `${day} ${month} ${year}`;
                }
             },
            { data: "tanggal_kawin",
                render: function(data, type, row) {
                    if (!data) return data;
                    
                    // Months in Indonesian
                    const months = [
                        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                    ];
                    
                    const date = new Date(data);
                    const day = date.getDate().toString().padStart(2, '0');
                    const month = months[date.getMonth()];
                    const year = date.getFullYear();
                    
                    return `${day} ${month} ${year}`;
                }
             },
            { data: "tanggal_ib",
                render: function(data, type, row) {
                    if (!data) return data;
                    
                    // Months in Indonesian
                    const months = [
                        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                    ];
                    
                    const date = new Date(data);
                    const day = date.getDate().toString().padStart(2, '0');
                    const month = months[date.getMonth()];
                    const year = date.getFullYear();
                    
                    return `${day} ${month} ${year}`;
                }
            },
            { data: "nomor_semen" },
            { data: "jenis_semen" },
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

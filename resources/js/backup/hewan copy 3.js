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
            { data: "tag" },
            {
                data: "jenis",
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

$(document).ready(function() {
    // Edit Modal Handler
    $(document).on('click', '.btn-edit', function() {
        const id = $(this).data('id');
        
        // Fetch animal data
        $.ajax({
            url: `/admin/hewan/${id}`,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Populate Modal Fields
                $('#edit-ternak-tag').val(data.tag);
                $('#edit-sex').val(data.sex.toLowerCase());
                
                // Fetch additional details from ternak_detail
                $.ajax({
                    url: `/admin/hewan/detail/${id}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(detailData) {
                        $('#edit-ternak-induk').val(detailData.ternak_induk || '');
                        $('#edit-tanggal-masuk').val(detailData.tanggal_masuk);
                        
                        // Select dropdowns
                        $('select[name="status_id"]').val(detailData.ternak_status);
                        $('select[name="tipe_id"]').val(detailData.ternak_tipe);
                        $('select[name="kesehatan_id"]').val(detailData.ternak_kesehatan);
                        $('select[name="program_id"]').val(detailData.ternak_program);
                        $('select[name="kandang_id"]').val(detailData.ternak_kandang);
                        $('select[name="user_id"]').val(detailData.pemilik);
                        
                        // Set form action dynamically
                        $('#editHewanForm').attr('action', `/admin/hewan/${id}`);
                        
                        // Show modal
                        $('#modal-edit').modal('show');
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Kesalahan',
                            text: 'Terjadi kesalahan saat mengambil detail hewan.'
                        });
                    }
                });
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Kesalahan',
                    text: 'Terjadi kesalahan saat mengambil data hewan.'
                });
            }
        });
    });
});
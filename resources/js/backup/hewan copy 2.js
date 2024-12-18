$(document).ready(function () {
    // Setup CSRF token for Ajax requests
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Initialize DataTable
    const table = $("#tableHewan").DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        pageLength: 10,
        dom: "t",
        language: {
            emptyTable: "Tidak ada data",
            zeroRecords: "Data tidak ditemukan",
            processing: "Loading...",
            paginate: {
                previous: "<",
                next: ">",
            },
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
            { data: "tag" },
            { data: "jenis" },
            { data: "sex" },
            { data: "ternak_tipe" },
            {
                data: "id",
                render: function (data, type, row) {
                    return `
                        <button class="btn btn-sm btn-warning btn-edit" 
                            data-id="${data}" 
                            data-tag="${row.tag}" 
                            data-jenis="${row.jenis}" 
                            data-sex="${row.sex}" 
                            data-tipe="${row.ternak_tipe}">
                            Edit
                        </button>
                    `;
                },
                orderable: false,
                searchable: false,
            },
        ],
    });

    // Handle Edit Button
    $(document).on("click", ".btn-edit", function () {
        const id = $(this).data("id");
        const tag = $(this).data("tag");
        const jenis = $(this).data("jenis");
        const sex = $(this).data("sex");
        const tipe = $(this).data("tipe");

        // Isi data ke modal
        $("#editTag").val(tag);
        $("#editJenis").val(jenis);
        $("#editSex").val(sex);
        $("#editTipeTernak").val(tipe);

        // Set form action
        $("#formEditHewan").attr("action", `/admin/hewan/${id}/update`);

        // Tampilkan modal
        $("#modal-edit-hewan").modal("show");
    });

    // Handle Form Submit
    $("#formEditHewan").on("submit", function (e) {
        e.preventDefault();
        const actionUrl = $(this).attr("action");
        const formData = $(this).serialize();

        // Kirim data dengan Ajax
        $.post(actionUrl, formData, function (response) {
            if (response.success) {
                $("#modal-edit-hewan").modal("hide");
                table.ajax.reload();
                alert("Data berhasil diperbarui!");
            } else {
                alert("Gagal memperbarui data!");
            }
        }).fail(function () {
            alert("Terjadi kesalahan!");
        });
    });
});

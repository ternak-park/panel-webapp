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
                data: "sex",
                render: function (data, type, row) {
                    // Kapital awal huruf
                    return data
                        ? data.charAt(0).toUpperCase() + data.slice(1)
                        : data;
                },
            },
            {
                data: "ternak_program",
                render: function (data, type, row) {
                    // Kapital awal huruf
                    return data
                        ? data.charAt(0).toUpperCase() + data.slice(1)
                        : data;
                },
            },
            {
                data: "jenis",
                render: function (data, type, row) {
                    return data ? data : "Tidak tersedia"; // Menampilkan nama tipe
                },
            },

            {
                data: "ternak_tipe",
                render: function (data, type, row) {
                    return data ? data : "Tidak tersedia"; // Menampilkan nama tipe
                },
            },

            { data: "action", orderable: false, searchable: false },

            {
                data: "id",
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    return `
                        <div class="text-center">
                            <input type="checkbox" class="form-check-input-lg row-checklist" value="${data}" data-id="${data}">
                        </div>
                    `;
                },
            },



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
                $("#edit-sex").val(
                    data.sex.charAt(0).toUpperCase() +
                        data.sex.slice(1).toLowerCase()
                );
                $("#edit-tanggal-masuk").val(
                    data.detail ? data.detail.tanggal_masuk : ""
                );

                // Set dropdown values
                $('select[name="ternak_status_indeks"]').val(
                    data.detail ? data.detail.ternak_status : ""
                );
                $('select[name="ternak_tipe_indeks"]').val(
                    data.detail ? data.detail.ternak_tipe : ""
                );
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

    $(document).ready(function () {
        // Pilih semua checkbox
        $(document).on("change", "#checkAll", function () {
            $(".row-checklist").prop("checked", this.checked);
        });

        // Hapus data yang dipilih
        $(document).on("click", "#deleteSelected", function () {
            let selectedIds = [];
            $(".row-checklist:checked").each(function () {
                selectedIds.push($(this).val());
            });

            if (selectedIds.length === 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Tidak ada yang dipilih",
                    text: "Silakan pilih setidaknya satu item untuk dihapus.",
                });
                return;
            }

            Swal.fire({
                title: "Apakah kamu yakin?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/admin/hewan/delete-multiple",
                        method: "POST",
                        data: { ids: selectedIds },
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: "success",
                                title: "Berhasil",
                                text: "Data berhasil dihapus!",
                            }).then(() => {
                                location.reload();
                                $("#tableHewan").DataTable().ajax.reload();
                            });
                        },
                        error: function () {
                            Swal.fire({
                                icon: "error",
                                title: "Kesalahan",
                                text: "Terjadi kesalahan saat menghapus data.",
                            });
                        },
                    });
                }
            });
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
});

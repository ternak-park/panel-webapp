$(document).ready(() => {
  const $ = window.$ // Declare the $ variable
  const Swal = window.Swal // Declare the Swal variable

  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
  })

  // DataTable initialization for kandang
  const table = $("#kandang-table").DataTable({
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
        previous:
          '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M15 6l-6 6l6 6" /></svg> prev',
        next: 'next <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M9 6l6 6l-6 6" /></svg>',
      },
      processing: "Loading...",
    },
    ajax: {
      url: "/admin/kandang",
      error: (xhr, error, thrown) => {
        console.error("DataTables error:", error, thrown)
        // Display a user-friendly error message
        $("#kandang-table tbody").html(
          '<tr><td colspan="7" class="text-center">Error loading data. Please refresh the page or contact administrator.</td></tr>',
        )
      },
    },
    orderCellsTop: true,
    columnDefs: [
      {
        orderable: false,
        targets: [0, 1, 6],
      },
      {
        orderable: true,
        targets: [2, 3, 4, 5],
        className: "sortable-column",
      },
    ],
    columns: [
      {
        // Checkbox column
        data: null,
        orderable: false,
        searchable: false,
        render: (data, type, row) =>
          '<input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select item" />',
      },
      {
        // Number column
        data: "DT_RowIndex",
        name: "DT_RowIndex",
        orderable: false,
        searchable: false,
      },
      {
        // Kode Kandang column
        data: "kode_kandang",
        name: "kode_kandang",
        orderable: true,
      },
      {
        // Total Ternak column
        data: "total_ternak_kandang",
        name: "total_ternak_kandang",
        orderable: true,
      },
      {
        // Pemilik column
        data: "pemilik",
        name: "pemilik.nama",
        orderable: true,
        render: (data, type, row) => (data && data.nama ? data.nama : "Tidak Ada Pemilik"),
      },
      {
        // Petugas column
        data: "petugas",
        name: "detail_kandang.petugas.nama",
        orderable: true,
        render: (data, type, row) =>
          row.detail_kandang && row.detail_kandang.petugas ? row.detail_kandang.petugas.nama : "Tidak Ada Petugas",
      },
      {
        // Action column
        data: "action",
        name: "action",
        orderable: false,
        searchable: false,
      },
    ],
    drawCallback: function (settings) {
      // Update table info
      const api = this.api()
      const pageInfo = api.page.info()
      const infoText =
        "Menampilkan " + (pageInfo.start + 1) + " sampai " + pageInfo.end + " dari " + pageInfo.recordsTotal + " data"
      $("#tableInfo").text(infoText)

      // Update pagination
      const pagination = $("#tablePagination")
      pagination.empty()

      // Previous button
      const prevDisabled = pageInfo.page === 0 ? "disabled" : ""
      pagination.append(
        '<li class="page-item ' +
          prevDisabled +
          '">' +
          '<a class="page-link" href="#" data-page="' +
          (pageInfo.page - 1) +
          '" aria-label="Previous">' +
          '<span aria-hidden="true">&laquo;</span>' +
          "</a></li>",
      )

      // Page numbers
      const startPage = Math.max(0, pageInfo.page - 2)
      const endPage = Math.min(pageInfo.pages - 1, pageInfo.page + 2)

      for (let i = startPage; i <= endPage; i++) {
        const active = pageInfo.page === i ? "active" : ""
        pagination.append(
          '<li class="page-item ' +
            active +
            '">' +
            '<a class="page-link" href="#" data-page="' +
            i +
            '">' +
            (i + 1) +
            "</a>" +
            "</li>",
        )
      }

      // Next button
      const nextDisabled = pageInfo.page === pageInfo.pages - 1 ? "disabled" : ""
      pagination.append(
        '<li class="page-item ' +
          nextDisabled +
          '">' +
          '<a class="page-link" href="#" data-page="' +
          (pageInfo.page + 1) +
          '" aria-label="Next">' +
          '<span aria-hidden="true">&raquo;</span>' +
          "</a></li>",
      )
    },
    initComplete: function () {
      // Add sort indicators to the orderable columns
      this.api()
        .columns()
        .every(function (index) {

          const columnDef = table.settings().init().columns[index]

          if (columnDef && columnDef.orderable !== false) {
            const header = $(this.header())

            // Add Tabler.io sort icon using SVG format
            if (!header.find(".sort-icon").length) {
              header.append(
                ' <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-muted sort-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline points="6 9 12 15 18 9" /></svg>',
              )
            }

            // Set the cursor style to pointer
            header.css("cursor", "pointer")
          }
        })

      // Add event listener for sort direction change
      this.api().on("order.dt", () => {
        const orderInfo = table.order()[0]
        const columnIndex = orderInfo[0]
        const direction = orderInfo[1]

        // Reset all icons first
        $(".sort-icon").each(function () {
          $(this).html('<path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline points="6 9 12 15 18 9" /></svg>')
        })

        // Update the icon for the sorted column
        const sortedHeader = $(table.column(columnIndex).header())
        const sortIcon = sortedHeader.find(".sort-icon")

        if (direction === "asc") {
          sortIcon.html(
            '<path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline points="6 15 12 9 18 15" /></svg>',
          )
        } else {
          sortIcon.html(
            '<path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline points="6 9 12 15 18 9" /></svg>',
          )
        }
      })
    },
  })

  // Select all checkbox
  $('thead input[type="checkbox"]').on("change", function () {
    var isChecked = this.checked
    table.rows().nodes().to$().find('input[type="checkbox"]').prop("checked", isChecked)
  })

  // Page Length handler
  $("#pageLength").on("change", function () {
    table.page.len($(this).val()).draw()
  })

  // Custom search
  $("#searchInput").on("keyup", function () {
    table.search($(this).val()).draw()
  })

  // Custom pagination
  $(document).on("click", "#tablePagination .page-link", function (e) {
    e.preventDefault()
    if (!$(this).closest("li").hasClass("disabled")) {
      table.page($(this).data("page")).draw("page")
    }
  })

  // Delete selected button
  $("#deleteSelected").on("click", () => {
    var selectedIds = []

    // Get all checkboxes that are checked (exclude the header checkbox)
    table
      .rows()
      .nodes()
      .to$()
      .find('input[type="checkbox"]:checked')
      .each(function () {
        var rowData = table.row($(this).closest("tr")).data()
        if (rowData && rowData.id) {
          selectedIds.push(rowData.id)
        }
      })

    if (selectedIds.length === 0) {
      Swal.fire({
        title: "Perhatian",
        text: "Tidak ada data yang dipilih",
        icon: "warning",
      })
      return
    }

    Swal.fire({
      title: "Anda yakin?",
      text: "Semua data yang dipilih akan dihapus secara permanen!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Ya, hapus!",
      cancelButtonText: "Tidak, batal!",
      reverseButtons: true,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "/admin/kandang/batch-delete",
          type: "POST",
          data: {
            ids: selectedIds,
          },
          success: (response) => {
            Swal.fire("Dihapus!", response.success || "Data telah dihapus.", "success").then(() => {
              // Refresh the table
              table.ajax.reload()

              // Reset the "select all" checkbox
              $('thead input[type="checkbox"]').prop("checked", false)
            })
          },
          error: (xhr, status, error) => {
            console.error("Delete error:", xhr.responseText)
            Swal.fire(
              "Error!",
              "Terjadi kesalahan saat menghapus data: " + (xhr.responseJSON ? xhr.responseJSON.error : error),
              "error",
            )
          },
        })
      }
    })
  })

  // Edit Modal Handler
  $(document).on("click", ".btn-edit", function () {
    const id = $(this).data("id")

    // Fetch kandang data
    $.ajax({
      url: `/admin/kandang/${id}/edit`,
      method: "GET",
      dataType: "json",
      success: (data) => {
        console.log("Edit data:", data) // For debugging

        // Basic Information
        $("#edit-kode-kandang").val(data.kode_kandang || "")
        $("#edit-total-ternak").val(data.total_ternak_kandang || "")
        $('select[name="jenis_id"]').val(data.jenis_id || "")
        $('select[name="pemilik_id"]').val(data.pemilik_id || "")

        // Detail kandang information
        if (data.detail_kandang) {
          $('select[name="petugas_id"]').val(data.detail_kandang.petugas_id || "")
        }

        // Set form action
        $("#editKandangForm").attr("action", `/admin/kandang/${id}`)

        // Refresh Tom Select instances to update the UI
        if (window.tomSelectInstances) {
          Object.values(window.tomSelectInstances).forEach((select) => {
            select.sync()
          })
        }

        // Show modal
        $("#modal-edit").modal("show")
      },
      error: (xhr) => {
        console.error("Edit error:", xhr)
        Swal.fire({
          icon: "error",
          title: "Kesalahan",
          text:
            "Terjadi kesalahan saat mengambil data kandang: " +
            (xhr.responseJSON ? xhr.responseJSON.message : xhr.statusText),
        })
      },
    })
  })
})

// Helper function to format the kandang data
function sihubDrawCallback(settings) {
  // Update table info
  const api = this.api()
  const pageInfo = api.page.info()
  const infoText =
    "Menampilkan " + (pageInfo.start + 1) + " sampai " + pageInfo.end + " dari " + pageInfo.recordsTotal + " data"
  $("#tableInfo").text(infoText)

  // Update pagination
  const pagination = $("#tablePagination")
  pagination.empty()

  // Previous button
  const prevDisabled = pageInfo.page === 0 ? "disabled" : ""
  pagination.append(
    '<li class="page-item ' +
      prevDisabled +
      '">' +
      '<a class="page-link" href="#" data-page="' +
      (pageInfo.page - 1) +
      '" aria-label="Previous">' +
      '<span aria-hidden="true">&laquo;</span>' +
      "</a></li>",
  )

  // Page numbers
  const startPage = Math.max(0, pageInfo.page - 2)
  const endPage = Math.min(pageInfo.pages - 1, pageInfo.page + 2)

  for (let i = startPage; i <= endPage; i++) {
    const active = pageInfo.page === i ? "active" : ""
    pagination.append(
      '<li class="page-item ' +
        active +
        '">' +
        '<a class="page-link" href="#" data-page="' +
        i +
        '">' +
        (i + 1) +
        "</a>" +
        "</li>",
    )
  }

  // Next button
  const nextDisabled = pageInfo.page === pageInfo.pages - 1 ? "disabled" : ""
  pagination.append(
    '<li class="page-item ' +
      nextDisabled +
      '">' +
      '<a class="page-link" href="#" data-page="' +
      (pageInfo.page + 1) +
      '" aria-label="Next">' +
      '<span aria-hidden="true">&raquo;</span>' +
      "</a></li>",
  )
}

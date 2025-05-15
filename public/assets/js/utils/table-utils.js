/**
 * TableUtils - Reusable utilities for DataTables with checkbox selection
 * and batch delete functionality
 */
const TableUtils = {
    // Track selected IDs for batch operations
    selectedIds: [],

    /**
     * Initialize DataTable with common settings and batch delete functionality
     * @param {Object} options - Configuration options
     * @returns {Object} - Initialized DataTable
     */
    initDataTable: function (options) {
        const defaults = {
            tableId: 'dataTable',
            ajaxUrl: '',
            columns: [],
            pageLength: 10,
            deleteUrl: '',
            deleteButtonId: 'deleteSelected'
        };

        const settings = {
            ...defaults,
            ...options
        };

        // Clear selected IDs when initializing
        this.selectedIds = [];

        // Initialize DataTable
        const table = $(`#${settings.tableId}`).DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            responsive: true,
            pageLength: settings.pageLength,
            dom: "t", // Only show the table (we'll handle pagination manually)
            classes: {
                sTable: "table table-vcenter table-striped card-table",
                sWrapper: "table-responsive",
            },
            language: {
                lengthMenu: "",
                info: "",
                infoFiltered: "",
                emptyTable: "Tidak ada data",
                infoEmpty: "Menampilkan 0 data",
                zeroRecords: "Data tidak ditemukan",
                pagingType: "simple",
                paginate: {
                    previous: '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M15 6l-6 6l6 6" /></svg> prev',
                    next: 'next <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M9 6l6 6l-6 6" /></svg>',
                },
                processing: "Loading...",
            },
            ajax: {
                url: settings.ajaxUrl,
                data: function (d) {
                    // Add custom parameters here if needed
                    return d;
                },
                error: function (xhr, error, thrown) {
                    console.error('DataTables error:', xhr.responseText);
                    $(`#${settings.tableId} tbody`).html('<tr><td colspan="8" class="text-center">Error loading data. Please refresh the page or contact administrator.</td></tr>');
                }
            },
            columns: settings.columns,
            drawCallback: function (settings) {
                // Use sihubDrawCallback if present, otherwise implement our own
                if (typeof sihubDrawCallback === 'function') {
                    sihubDrawCallback.call(this, settings);
                } else {
                    // Update pagination info
                    const api = this.api();
                    const pageInfo = api.page.info();

                    // Update pagination info
                    $("#tableInfo").html(
                        "Menampilkan " + (pageInfo.start + 1) + " sampai " + pageInfo.end + " dari " + pageInfo.recordsTotal + " data"
                    );

                    // Create pagination elements
                    let pagination = "";
                    pagination += '<li class="page-item ' + (pageInfo.page === 0 ? "disabled" : "") + '">';
                    pagination += '<a class="page-link" href="#" data-page="' + (pageInfo.page - 1) + '" aria-label="Previous">';
                    pagination += '<span aria-hidden="true">&laquo;</span></a></li>';

                    for (let i = 0; i < pageInfo.pages; i++) {
                        pagination += '<li class="page-item ' + (pageInfo.page === i ? "active" : "") + '">';
                        pagination += '<a class="page-link" href="#" data-page="' + i + '">' + (i + 1) + '</a></li>';
                    }

                    pagination += '<li class="page-item ' + (pageInfo.page === pageInfo.pages - 1 ? "disabled" : "") + '">';
                    pagination += '<a class="page-link" href="#" data-page="' + (pageInfo.page + 1) + '" aria-label="Next">';
                    pagination += '<span aria-hidden="true">&raquo;</span></a></li>';

                    $("#tablePagination").html(pagination);
                }

                // Re-apply checkbox state after redraw
                TableUtils.reapplyCheckboxState(settings.tableId);
            }
        });

        // Add custom CSS for row highlighting if not already present
        if (!$('#custom-highlighting-css').length) {
            $('head').append(`
                <style id="custom-highlighting-css">
                    #${settings.tableId} tr.selected {
                        background-color: rgba(32, 107, 196, 0.1) !important;
                    }
                    #${settings.deleteButtonId}.disabled, 
                    #${settings.deleteButtonId}[disabled] {
                        opacity: 0.65;
                        pointer-events: none;
                    }
                </style>
            `);
        }

        // Bind event listeners for checkboxes and delete button
        this.bindEvents(settings.tableId, settings.deleteButtonId, settings.deleteUrl, table);

        return table;
    },

    /**
     * Bind events for checkbox selection and delete functionality
     */
    bindEvents: function (tableId, deleteButtonId, deleteUrl, table) {
        const self = this;

        // Select all checkbox handler
        $(document).off('change', `#${tableId} thead input[type="checkbox"]`).on('change', `#${tableId} thead input[type="checkbox"]`, function () {
            const isChecked = $(this).prop('checked');

            // Check/uncheck all visible checkboxes
            $(`#${tableId} tbody input.item-checkbox`).prop('checked', isChecked);

            // Highlight rows
            $(`#${tableId} tbody tr`).toggleClass('selected', isChecked);

            // Update selectedIds array and delete button
            self.updateSelectedIdsFromTable(tableId);
            self.updateDeleteButtonState(deleteButtonId);
        });

        // Individual checkbox handler
        $(document).off('change', `#${tableId} tbody input.item-checkbox`).on('change', `#${tableId} tbody input.item-checkbox`, function () {
            // Highlight this row
            $(this).closest('tr').toggleClass('selected', $(this).prop('checked'));

            // Update header checkbox state
            const totalCheckboxes = $(`#${tableId} tbody input.item-checkbox`).length;
            const checkedCheckboxes = $(`#${tableId} tbody input.item-checkbox:checked`).length;
            $(`#${tableId} thead input[type="checkbox"]`).prop('checked',
                totalCheckboxes > 0 && totalCheckboxes === checkedCheckboxes);

            // Update selectedIds array and delete button
            self.updateSelectedIdsFromTable(tableId);
            self.updateDeleteButtonState(deleteButtonId);
        });

        // Delete selected button handler
        $(document).off('click', `#${deleteButtonId}`).on('click', `#${deleteButtonId}`, function () {
            // Check if button is disabled
            if ($(this).hasClass('disabled') || $(this).prop('disabled')) {
                return;
            }

            if (self.selectedIds.length === 0) {
                Swal.fire({
                    title: "Perhatian",
                    text: "Tidak ada data yang dipilih",
                    icon: "warning",
                });
                return;
            }

            Swal.fire({
                title: "Anda yakin?",
                text: self.selectedIds.length + " data yang dipilih akan dihapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Tidak, batal!",
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: deleteUrl,
                        type: "POST",
                        data: {
                            ids: self.selectedIds
                        },
                        success: function (response) {
                            Swal.fire(
                                "Dihapus!",
                                response.success || "Data telah dihapus.",
                                "success"
                            ).then(() => {
                                // Clear selected IDs
                                self.selectedIds = [];

                                // Refresh the table
                                table.ajax.reload();

                                // Reset delete button state
                                self.updateDeleteButtonState(deleteButtonId);
                            });
                        },
                        error: function (xhr, status, error) {
                            console.error("Delete error:", xhr.responseText);
                            Swal.fire(
                                "Error!",
                                "Terjadi kesalahan saat menghapus data: " +
                                (xhr.responseJSON ? xhr.responseJSON.error : error),
                                "error"
                            );
                        },
                    });
                }
            });
        });

        // Custom pagination
        $(document).off('click', "#tablePagination .page-link").on('click', "#tablePagination .page-link", function (e) {
            e.preventDefault();
            if (!$(this).closest("li").hasClass("disabled")) {
                table.page($(this).data("page")).draw("page");
            }
        });

        // Custom search
        $("#searchInput").off('keyup').on("keyup", function () {
            table.search($(this).val()).draw();
        });

        // Custom Page Length handler with text input
        $("#customPageLength").off('change').on("change", function () {
            let value = parseInt($(this).val(), 10);

            // Set constraints
            if (isNaN(value) || value < 1) {
                value = 10; // Default to 10 if invalid
                $(this).val(value);
            } else if (value > 1000) {
                value = 1000; // Cap at 1000 for performance
                $(this).val(value);
            }

            // Change page length
            table.page.len(value).draw();
        });

        // Allow Enter key to trigger page length change
        $("#customPageLength").off('keypress').on("keypress", function (e) {
            if (e.which === 13) { // Enter key
                e.preventDefault();
                $(this).trigger("change");
            }
        });
    },

    /**
     * Update the selectedIds array based on checked checkboxes
     */
    updateSelectedIdsFromTable: function (tableId) {
        this.selectedIds = [];
        $(`#${tableId} tbody input.item-checkbox:checked`).each(function () {
            const id = $(this).data('id');
            if (id) {
                TableUtils.selectedIds.push(id);
            }
        });
        console.log("Selected IDs updated:", this.selectedIds);
    },

    /**
     * Update the delete button state based on selectedIds
     */
    updateDeleteButtonState: function (deleteButtonId) {
        const checkedCount = this.selectedIds.length;

        if (checkedCount > 0) {
            // Enable button
            $(`#${deleteButtonId}`).prop('disabled', false).removeClass('disabled').addClass('btn-danger');
            // Update text to show count
            $(`#${deleteButtonId}`).html(`Hapus (${checkedCount})`);
        } else {
            // Disable button
            $(`#${deleteButtonId}`).prop('disabled', true).addClass('disabled').removeClass('btn-danger');
            // Reset text
            $(`#${deleteButtonId}`).html('Hapus');
        }
    },

    /**
     * Reapply checkbox state after table redraw
     */
    reapplyCheckboxState: function (tableId) {
        const self = this;

        // Clear all checkboxes first
        $(`#${tableId} input.item-checkbox`).prop('checked', false);

        // If we have stored IDs, check the corresponding rows
        if (this.selectedIds.length > 0) {
            $(`#${tableId} tbody input.item-checkbox`).each(function () {
                const id = $(this).data('id');
                if (self.selectedIds.includes(id)) {
                    $(this).prop('checked', true);
                    $(this).closest('tr').addClass('selected');
                }
            });
        }

        // Update header checkbox state
        const totalCheckboxes = $(`#${tableId} tbody input.item-checkbox`).length;
        const checkedCheckboxes = $(`#${tableId} tbody input.item-checkbox:checked`).length;
        $(`#${tableId} thead input[type="checkbox"]`).prop('checked',
            totalCheckboxes > 0 && totalCheckboxes === checkedCheckboxes);
    }
};

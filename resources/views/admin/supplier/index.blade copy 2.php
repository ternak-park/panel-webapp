 <x-app>
    <div class="page">
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                      sa
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <span class="d-none d-sm-inline">
                                    <a href="sad" class="btn">
                                        Cetak
                                    </a>
                                </span>
                                <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                                    data-bs-target="#modal-tambahData">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    Tambah Produk
                                </a>
                                <a href="" class="btn btn-primary d-sm-none btn-icon"
                                    data-bs-toggle="modal" data-bs-target="#modal-tambahData" aria-label="Tambah Produk">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-vcenter table-mobile-md card-table" id="tableBase">
                                        <thead>
                                            <br />
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Jenis Pakan</th>
                                                <th>Supplier</th>
                                                <th>Harga Per KG</th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

     <script>
         $(document).ready(function() {
             let url = "{{ route('suppliers.index') }}";
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });

             $("#tableBase").DataTable({
                 processing: true,
                 serverSide: true,
                 autoWidth: false,
                 pageLength: 10,
                 dom: "<'.row'<'col-12 col-md-6 pb-2'l><'col-12 col-md-4 ms-auto pb-2'f>><'.row'<'col-12'tr>><'.row'<'col-4'i><'col-8'p>>",
                 language: {
                     lengthMenu: "Tampilkan _MENU_ data",
                     info: "Data ke _START_ - _END_ dari _TOTAL_",
                     infoFiltered: "(disaring dari total _MAX_ data)",
                     emptyTable: "Tidak ada data",
                     infoEmpty: "Menampilkan 0 data",
                     zeroRecords: "Data tidak ditemukan",
                 },
                 ajax: "{{ route('suppliers.index') }}",
                 columns: [{
                         "title": "kode",
                         "data": "kode",
                     },
                     {
                         "title": "jenis_pakan",
                         "data": "jenis_pakan",
                     },
                     {
                         "title": "nama",
                         "data": "nama",
                     },
                     {
                         "title": "harga_per_kg",
                         "data": "harga_per_kg",
                     },
                     {
                         "title": "alamat",
                         "data": "alamat",
                     },
                     {
                         "title": "telepon",
                         "data": "telepon",
                     },
                     {
                         "title": "action",
                         "data": "action",
                         "orderable": false,
                     }
                 ],
             });
             $(document).on('click', '.delete', function() {
                 const id = $(this).data('id');
                 Swal.fire({
                     title: 'Are you sure?',
                     text: 'This supplier will be deleted permanently!',
                     icon: 'warning',
                     showCancelButton: true,
                     confirmButtonText: 'Yes, delete it!',
                     cancelButtonText: 'No, cancel!',
                     reverseButtons: true
                 }).then((result) => {
                     if (result.isConfirmed) {
                         $.ajax({
                             url: "/suppliers/" + id,
                             type: 'DELETE',
                             success: function(result) {
                                 Swal.fire(
                                     'Deleted!',
                                     'The supplier has been deleted.',
                                     'success'
                                 );
                                 $('#tableBase').DataTable().ajax.reload();
                             },
                             error: function(err) {
                                 Swal.fire(
                                     'Error!',
                                     'There was an error deleting the supplier.',
                                     'error'
                                 );
                             }
                         });
                     } else {
                         Swal.fire(
                             'Cancelled',
                             'The supplier was not deleted.',
                             'info'
                         );
                     }
                 });
             });
         });
     </script>



 </x-app>

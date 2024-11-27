 <x-app>
     {{-- sweet alert mas --}}
     @if (session('success'))
         <script>
             Swal.fire({
                 title: 'Success!',
                 text: "{{ session('success') }}",
                 icon: 'success',
                 confirmButtonText: 'OK'
             });
         </script>
     @elseif(session('error'))
         <script>
             Swal.fire({
                 title: 'Error!',
                 text: "{{ session('error') }}",
                 icon: 'error',
                 confirmButtonText: 'OK'
             });
         </script>
     @endif
     {{-- end sweet alert mas --}}

     <div class="container">
         <div class="row justify-content-center">
             <div class="col-md-8">

                 <div class="container">
                     <meta name="csrf-token" content="{{ csrf_token() }}">
                     <h1>Supplier</h1>
                     <a href="{{ route('suppliers.create') }}" class="btn btn-success">Add New Supplier</a>
                     <table class="table table-bordered data-table" id="tableBase">
                         <thead>
                             <tr>
                                 <th>No</th>
                                 <th>Kode</th>
                                 <th>Jenis Pakan</th>
                                 <th>Supplier</th>
                                 <th>Harga Per KG</th>
                                 <th>Alamat</th>
                                 <th>Telepon</th>
                                 {{-- <th>Action</th> --}}
                             </tr>
                         </thead>
                         <tbody>
                         </tbody>
                     </table>
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

<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="container">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <h1>Supplier</h1>
                    <table class="table table-bordered data-table" id="list">
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

                $("#list").DataTable({
                    processing: true,
                    serverSide: true,
                    autoWidth: false,
                    pageLength: 10,
                    ajax: "{{ route('suppliers.index') }}",
                    columns: [{
                            "title": "kode",
                            "data": "kode",
                        }, {
                            "title": "jenis_pakan",
                            "data": "jenis_pakan",
                        }, {
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
                        }
                    ],
                });
            });
        </script>

</x-app>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        {{-- gawe nyeluk component navbar --}}
        <x-navbar />
        <main class="py-4">
            {{ $slot }}
        </main>
    </div>
</body>
<script>
  $(document).ready(function() {
        $(".data-table").each(function() {
            if (!$.fn.DataTable.isDataTable(this)) {
                $(this).DataTable({
                    dom: "<'.row'<'col-12 col-md-6 pb-2'l><'col-12 col-md-4 ms-auto pb-2'f>><'.row'<'col-12'tr>><'.row'<'col-4'i><'col-8'p>>",
                    language: {
                        lengthMenu: "Tampilkan _MENU_ data",
                        info: "Data ke _START_ - _END_ dari _TOTAL_",
                        infoFiltered: "(disaring dari total _MAX_ data)",
                        emptyTable: "Tidak ada data",
                        infoEmpty: "Menampilkan 0 data",
                        zeroRecords: "Data tidak ditemukan",
                    },
                    pageLength: 25,
                    autoWidth: false,
                });
            }
        });
    });
</script>

</html>

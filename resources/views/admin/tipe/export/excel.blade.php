<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Tipe</th>
            <th>Nama Tipe</th>
            <th>Deskripsi</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($tipe as $index => $tipe)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $tipe->kode_tipe }}</td>
                <td>{{ $tipe->nama_tipe }}</td>
                <td>{{ $tipe->deskripsi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

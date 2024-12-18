<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Kesehatan</th>
            <th>Nama Kesehatan</th>
            <th>Deskripsi</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($kesehatan as $index => $kesehatan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kesehatan->kode_kesehatan }}</td>
                <td>{{ $kesehatan->nama_kesehatan }}</td>
                <td>{{ $kesehatan->deskripsi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

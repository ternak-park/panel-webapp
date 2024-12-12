<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Status</th>
            <th>Nama Status</th>
            <th>Deskripsi</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($status as $index => $status)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $status->kode_status }}</td>
                <td>{{ $status->nama_status }}</td>
                <td>{{ $status->deskripsi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

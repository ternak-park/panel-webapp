<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Program</th>
            <th>Nama Program</th>
            <th>Deskripsi</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($program as $index => $program)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $program->kode_program }}</td>
                <td>{{ $program->nama_program }}</td>
                <td>{{ $program->deskripsi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

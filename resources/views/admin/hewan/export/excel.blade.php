<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Tag</th>
            <th>Jenis</th>
            <th>Sex</th>
            <th>Tipe</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($hewan as $index => $hewan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $hewan->tag }}</td>
                <td>{{ $hewan->jenis }}</td>
                <td>{{ $hewan->sex }}</td>
                <td>{{ $hewan->ternak_tipe }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Kandang</th>
            <th>Jenis</th>
            <th>Kapasitas</th>
            <th>Jumlah Ternak</th>
            <th>Status</th>
            <th>Dibuat Pada</th>
            <th>Diperbarui Pada</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kandang as $key => $k)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $k->kode_kandang }}</td>
            <td>{{ $k->jenis->nama }}</td>
            <td>{{ $k->kapasitas }}</td>
            <td>{{ $k->jumlah_ternak }}</td>
            <td>{{ $k->status }}</td>
            <td>{{ $k->created_at->format('d-m-Y H:i:s') }}</td>
            <td>{{ $k->updated_at->format('d-m-Y H:i:s') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- <a href="{{ route('suppliers.show', $id) }}" class="view btn btn-primary btn-sm">View</a> --}}
{{-- <a href="{{ route('suppliers.edit', $id) }}" class="edit btn btn-warning btn-sm">Edit</a> --}}
<td>
    <a data-id="{{ $id }}" href="{{ route('hewan.show', $id) }}">View</a>
</td>,
<td>
    <a href="#">Edit</a>
</td>,
<td>
    <a data-id="{{ $id }}" class="delete" href="#">Delete</a>
</td>

{{-- <button data-id="{{ $id }}" class="delete btn btn-danger btn-sm">Delete</button> --}}

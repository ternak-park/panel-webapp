<a href="{{ route('suppliers.show', $id) }}" class="view btn btn-primary btn-sm">View</a>
<a href="{{ route('suppliers.edit', $id) }}" class="edit btn btn-warning btn-sm">Edit</a>
<button data-id="{{ $id }}" class="delete btn btn-danger btn-sm">Delete</button>

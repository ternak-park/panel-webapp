{{-- <a href="{{ route('suppliers.show', $id) }}" class="view btn btn-primary btn-sm">View</a> --}}
{{-- <a href="{{ route('suppliers.edit', $id) }}" class="edit btn btn-warning btn-sm">Edit</a> --}}
{{-- <a class="btn btn-primary btn-sm" data-id="{{ $id }}" href="{{ route('hewan.show', $id) }}" >
    <i class="fas fa-eye"></i>
</a>

<button class="btn btn-warning btn-sm btn-edit" data-id="{{ $id }}" data-bs-toggle="modal"
    data-bs-target="#modal-edit" title="Edit Hewan">
    <i class="fas fa-edit"></i>
</button>

<button class="btn btn-danger btn-sm delete" data-id="{{ $id }}" title="Edit Hewan">
    <i class="fas fa-trash"></i>
</button> --}}


<div class="btn-group">
    <a type="button" class="btn btn-sm btn-primary"data-id="{{ $id }}" href="{{ route('hewan.show', $id) }}" 
        style="padding: 4px 8px; font-size: 12px;">
        <i class="fa-solid fa-eye"></i>
    </a>
    <a type="button" class="btn btn-sm btn-warning btn-edit" data-id="{{ $id }}" 
    style="padding: 4px 8px; font-size: 12px;">
    <i class="fa-solid fa-pen-to-square"></i>
</a>
    <button type="button" class="btn btn-sm btn-danger delete" data-id="{{ $id }}"
        style="padding: 4px 8px; font-size: 12px;">
        <i class="fa-solid fa-trash"></i>
    </button>
</div>


{{-- <button data-id="{{ $id }}" class="delete btn btn-danger btn-sm">Delete</button> --}}

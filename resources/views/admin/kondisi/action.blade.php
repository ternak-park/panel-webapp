{{-- <a href="{{ route('suppliers.show', $id) }}" class="view btn btn-primary btn-sm">View</a> --}}
{{-- <a href="{{ route('suppliers.edit', $id) }}" class="edit btn btn-warning btn-sm">Edit</a> --}}

<div class="btn-group">
  <a type="button" class="btn btn-sm btn-primary action-view" data-id="{{ $id }}"
      href="#" style="padding: 4px 8px; font-size: 12px;">
      <i class="fa-solid fa-eye"></i>
  </a>
  <a type="button" class="btn btn-sm btn-warning btn-edit action-edit" data-id="{{ $id }}"
      style="padding: 4px 8px; font-size: 12px;">
      <i class="fa-solid fa-pen-to-square"></i>
  </a>
  <button type="button" class="btn btn-sm btn-danger delete action-delete" data-id="{{ $id }}"
      style="padding: 4px 8px; font-size: 12px;">
      <i class="fa-solid fa-trash"></i>
  </button>
</div>
{{-- 
<div class="btn-list flex-nowrap">
    <a href="#" class="btn btn-outline-primary w-100 btn-sm" style="width: 100px; font-size: 12px; padding: 5px;">
      Edit
    </a>
    <a data-id="{{ $id }}" class="delete btn btn-danger w-100 btn-sm" style="width: 100px; font-size: 12px; padding: 5px;">
         Delete
    </a>
  </div> --}}

  {{-- <button data-id="{{ $id }}" class="delete btn btn-danger btn-sm">Delete</button> --}}

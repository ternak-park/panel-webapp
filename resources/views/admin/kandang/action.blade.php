{{-- <div class="btn-group">
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
 --}}

<div class="btn-group">
    <a type="button" class="btn btn-sm btn-primary action-view" data-id="{{ $id }}"
        href="{{ route('hewan.show', $id) }}" style="padding: 4px 8px; font-size: 12px;">
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

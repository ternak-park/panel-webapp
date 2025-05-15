<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-cogs"></i>
    </button>
    <div class="dropdown-menu">
        <a href="{{ route('admin.kandang.show', $model->id) }}" class="dropdown-item">
            <i class="fa fa-eye"></i> Detail
        </a>
        <a href="{{ route('admin.kandang.edit', $model->id) }}" class="dropdown-item">
            <i class="fa fa-edit"></i> Edit
        </a>
        <a href="javascript:void(0)" data-id="{{ $model->id }}" class="dropdown-item delete-item">
            <i class="fa fa-trash"></i> Delete
        </a>
    </div>
</div>

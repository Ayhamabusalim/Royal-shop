<div class="d-flex justify-content-center gap-2">
    <button type="button" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1 shadow-sm"
        id="btn_edit_subcategory" data-subcategory-id="{{ $subcategory->id }}" data-bs-toggle="modal"
        data-bs-target="#editModalSubCategory" data-bs-toggle="tooltip" data-bs-placement="top"
        style="padding: 6px 14px; border-radius: 0.5rem; transition: all 0.2s ease;">
        <i class="bi bi-pencil-fill"></i>
    </button>

    <button type="button" class="btn btn-outline-danger btn-sm d-flex align-items-center gap-1 shadow-sm"
        id="btn_delete_subcategory" data-subcategory-id="{{ $subcategory->id }}" data-bs-toggle="tooltip"
        data-bs-placement="top" style="padding: 6px 14px; border-radius: 0.5rem; transition: all 0.2s ease;">
        <i class="bi bi-trash-fill"></i>

    </button>
</div>
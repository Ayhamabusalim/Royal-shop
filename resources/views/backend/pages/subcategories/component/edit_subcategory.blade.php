<!-- Modal -->
<div class="modal fade" id="editModalSubCategory" tabindex="-1" aria-labelledby="editModalCategoryLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalCategoryLabel">Edit Sub Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form-new-product form-style-1" id="edit-form-Subcategory" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="subcategory-id" name="id">

                <fieldset class="name">
                    <div class="body-title"> Category <span class="tf-color-1">*</span></div>
                    <select name="category_id" id="category-select" class="flex-grow" required>
                        <!-- الخيارات ديناميكية -->
                    </select>
                </fieldset>

                <fieldset class="name">
                    <div class="body-title">Sub Category Name <span class="tf-color-1">*</span></div>
                    <input class="flex-grow @error('name') is-invalid @enderror" type="text" name="name" required>
                    @error('name')
                        <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                </fieldset>

                <fieldset class="name">
                    <div class="body-title">Category Description <span class="tf-color-1">*</span></div>
                    <input class="flex-grow @error('description') is-invalid @enderror" type="text" name="description"
                        required>
                    @error('description')
                        <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                </fieldset>

                <fieldset class="name">
                    <div class="body-title">Meta Title <span class="tf-color-1">*</span></div>
                    <input class="flex-grow @error('meta_title') is-invalid @enderror" type="text" name="meta_title"
                        required>
                    @error('meta_title')
                        <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                </fieldset>

                <fieldset class="name">
                    <div class="body-title">Meta Description <span class="tf-color-1">*</span></div>
                    <input class="flex-grow @error('meta_description') is-invalid @enderror" type="text"
                        name="meta_description" required>
                    @error('meta_description')
                        <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                </fieldset>

                <fieldset class="name">
                    <div class="body-title">Category Slug <span class="tf-color-1">*</span></div>
                    <input class="flex-grow @error('slug') is-invalid @enderror" type="text" name="slug" required>
                    @error('slug')
                        <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                </fieldset>

                <fieldset>
                    <div class="body-title">Upload images <span class="tf-color-1">*</span></div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="current-image-preview" style="margin-top: 10px;">
                            <img id="preview-image" src="" class="effect8" alt="Current Image"
                                style="max-height: 150px; display: none;">
                        </div>
                        <div id="upload-file" class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon"><i class="icon-upload-cloud"></i></span>
                                <span class="body-text">Drop your images here or select <span class="tf-color">click
                                        to browse</span></span>
                                <input type="file" id="myFile" name="image" accept="image/*"
                                    class="@error('image') is-invalid @enderror">
                            </label>
                            @error('image')
                                <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@extends('backend.layout.master')
@section('main')
    <div class="main-content">
        <div class="main-content-inner">
            <!-- main-content-wrap -->
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>Category infomation</h3>
                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                        <li>
                            <a href="#">
                                <div class="text-tiny">Dashboard</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <a href="#">
                                <div class="text-tiny">Sub Categories</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <div class="text-tiny">New Sub Category</div>
                        </li>
                    </ul>
                </div>
                <!-- new-category -->
                <div class="wg-box">
                    <form class="form-new-product form-style-1" action="{{ route('subcategories.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <fieldset class="name">
                            <div class="body-title">Category Name <span class="tf-color-1">*</span></div>
                            <select name="category_id" required>
                                <option value="">-- choose category name --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title">Sub Category Name <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="text" placeholder="Sub Category name" name="name"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title">Sub Category Description <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="text" placeholder="Category Description" name="description"
                                value="{{ old('description') }}" required>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title">Meta Title <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="text" placeholder="Meta Title" name="meta_title"
                                value="{{ old('meta_title') }}" required>
                            @error('meta_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title">Meta Description <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="text" placeholder="Meta Description" name="meta_description"
                                value="{{ old('meta_description') }}" required>
                            @error('meta_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title">Sub Category Slug <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="text" placeholder="Sub Category Slug" name="slug"
                                value="{{ old('slug') }}" required>
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                        <fieldset>
                            <div class="body-title">Upload images <span class="tf-color-1">*</span></div>
                            <div class="upload-image flex-grow">
                                <div class="item" id="imgpreview" style="display:none">
                                    <img src="#" class="effect8" alt="" id="preview-image" style="max-width: 200px;" />
                                </div>
                                <div id="upload-file" class="item up-load">
                                    <label class="uploadfile" for="myFile">
                                        <span class="icon"><i class="icon-upload-cloud"></i></span>
                                        <span class="body-text">Drop your image here or <span class="tf-color">click to
                                                browse</span></span>
                                        <input type="file" id="myFile" name="image" accept="image/*"
                                            onchange="previewImage(event)">
                                    </label>
                                </div>
                            </div>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>

                        <div class="bot">
                            <div></div>
                            <button class="tf-button w208" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="bottom-page">
            <div class="body-text">Copyright © 2024 SurfsideMedia</div>
        </div>
    </div>
@endsection
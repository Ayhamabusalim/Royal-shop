@extends('backend.layout.master')
@section('main')
    <div class="main-content">
        <div class="main-content-inner">
            <!-- main-content-wrap -->
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3> Sub Category infomation</h3>
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
                    <form class="form-new-product form-style-1"
                        action="{{ route('subcategories.update', $subcategory->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <fieldset class="name">
                            <div class="body-title">Category Name <span class="tf-color-1">*</span></div>
                            <select name="category_id" required>
                                <option value="">-- choose category name --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $subcategory->category_id) == $category->id ? 'selected' : '' }}>
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
                            <input class="flex-grow" type="text" name="name" value="{{ old('name', $subcategory->name) }}"
                                required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title">Sub Category Description <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="text" name="description"
                                value="{{ old('description', $subcategory->description) }}" required>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title">Meta Title <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="text" name="meta_title"
                                value="{{ old('meta_title', $subcategory->meta_title) }}" required>
                            @error('meta_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title">Meta Description <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="text" name="meta_description"
                                value="{{ old('meta_description', $subcategory->meta_description) }}" required>
                            @error('meta_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title">Sub Category Slug <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="text" name="slug" value="{{ old('slug', $subcategory->slug) }}"
                                required>
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                        <fieldset>
                            <div class="body-title">Upload image <span class="tf-color-1">*</span></div>
                            <div class="upload-image flex-grow">
                                @if ($subcategory->image)
                                    <div class="item" style="margin-bottom: 10px;">
                                        <img src="{{ asset('images/subcategories/' . $subcategory->image) }}" alt="Current Image"
                                            style="max-width: 200px;">
                                    </div>
                                @endif
                                <div id="upload-file" class="item up-load">
                                    <label class="uploadfile" for="myFile">
                                        <span class="icon"><i class="icon-upload-cloud"></i></span>
                                        <span class="body-text">Drop your image here or <span class="tf-color">click to
                                                browse</span></span>
                                        <input type="file" id="myFile" name="image" accept="image/*">
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

       
    </div>
@endsection
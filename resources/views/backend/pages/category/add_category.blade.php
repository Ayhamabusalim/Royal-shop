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
                            <a href="{{route('dashboard')}}">
                                <div class="text-tiny">Dashboard</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <a href="{{route('categories')}}">
                                <div class="text-tiny">Categories</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <div class="text-tiny">New Category</div>
                        </li>
                    </ul>
                </div>
                <!-- new-category -->
                <div class="wg-box">
                    <form class="form-new-product form-style-1" action="{{ route('store_category') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- Category Name --}}
                        <fieldset class="name">
                            <div class="body-title">Category Name <span class="tf-color-1">*</span></div>
                            <input class="flex-grow @error('name') is-invalid @enderror" type="text"
                                placeholder="Category name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                            @enderror
                        </fieldset>

                        {{-- Category Description --}}
                        <fieldset class="name">
                            <div class="body-title">Category Description <span class="tf-color-1">*</span></div>
                            <input class="flex-grow @error('description') is-invalid @enderror" type="text"
                                placeholder="Category Description" name="description" value="{{ old('description') }}"
                                required>
                            @error('description')
                                <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                            @enderror
                        </fieldset>

                        {{-- Meta Title --}}
                        <fieldset class="name">
                            <div class="body-title">Meta Title <span class="tf-color-1">*</span></div>
                            <input class="flex-grow @error('meta_title') is-invalid @enderror" type="text"
                                placeholder="Meta Title" name="meta_title" value="{{ old('meta_title') }}" required>
                            @error('meta_title')
                                <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                            @enderror
                        </fieldset>

                        {{-- Meta Description --}}
                        <fieldset class="name">
                            <div class="body-title">Meta Description <span class="tf-color-1">*</span></div>
                            <input class="flex-grow @error('meta_description') is-invalid @enderror" type="text"
                                placeholder="Meta Description" name="meta_description" value="{{ old('meta_description') }}"
                                required>
                            @error('meta_description')
                                <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                            @enderror
                        </fieldset>

                        {{-- Slug --}}
                        <fieldset class="name">
                            <div class="body-title">Category Slug <span class="tf-color-1">*</span></div>
                            <input class="flex-grow @error('slug') is-invalid @enderror" type="text"
                                placeholder="Category Slug" name="slug" value="{{ old('slug') }}" required>
                            @error('slug')
                                <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                            @enderror
                        </fieldset>

                        {{-- Image --}}
                        <fieldset>
                            <div class="body-title">Upload images <span class="tf-color-1">*</span></div>
                            <div class="upload-image flex-grow">
                                <div class="item" id="imgpreview" style="display:none">
                                    <img src="upload-1.html" class="effect8" alt="">
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

                        {{-- Submit --}}
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
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
                    <form class="form-new-product form-style-1" action="{{route('subcategories.update', $subcategory->id)}}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <fieldset class="name">
                            <div class="body-title">Category Name <span class="tf-color-1">*</span>
                            </div>
                            <select name="category_id" required>
                                <option value="">-- chose category name --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title"> Sub Category Name <span class="tf-color-1">*</span>
                            </div>
                            <input class="flex-grow" type="text" placeholder="" name="name" tabindex="0"
                                value="{{$subcategory->name}}" aria-required="true" required="">
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title">Sub Category Description <span class="tf-color-1">*</span>
                            </div>
                            <input class="flex-grow" type="text" placeholder="" name="description" tabindex="0"
                                value="{{$subcategory->description}}" aria-required="true" required="">
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title">Meta Title <span class="tf-color-1">*</span>
                            </div>
                            <input class="flex-grow" type="text" placeholder="" name="meta_title" tabindex="0"
                                value="{{$subcategory->meta_title}}" aria-required="true" required="">
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title">Meta Description <span class="tf-color-1">*</span>
                            </div>
                            <input class="flex-grow" type="text" placeholder="" name="meta_description" tabindex="0"
                                value="{{$subcategory->meta_description}}" aria-required="true" required="">
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title">Sub Category Slug <span class="tf-color-1">*</span>
                            </div>
                            <input class="flex-grow" type="text" placeholder="" name="slug" tabindex="0"
                                value="{{$subcategory->slug}}" aria-required="true" required="">
                        </fieldset>
                        <fieldset>
                            <div class="body-title">Upload images <span class="tf-color-1">*</span>
                            </div>
                            <div class="upload-image flex-grow">
                                <div class="item" id="imgpreview" style="display:none">
                                    <img src="upload-1.html" class="effect8" alt="">
                                </div>
                                <div id="upload-file" class="item up-load">
                                    <label class="uploadfile" for="myFile">
                                        <span class="icon">
                                            <i class="icon-upload-cloud"></i>
                                        </span>
                                        <span class="body-text">Drop your images here or select <span class="tf-color">click
                                                to browse</span></span>
                                        <input type="file" id="myFile" name="image" accept="image/*"
                                            value={{$subcategory->image}}>
                                    </label>
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

        <div class="bottom-page">
            <div class="body-text">Copyright © 2024 SurfsideMedia</div>
        </div>
    </div>
@endsection
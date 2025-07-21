@extends('backend.layout.master')
@section('main')
    <div>
        <div class="section-content-right">

            <div class="main-content">

                <!-- main-content-wrap -->
                <div class="main-content-inner">
                    <!-- main-content-wrap -->
                    <div class="main-content-wrap">
                        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                            <h3>Add Product</h3>
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
                                    <a href="{{route('products')}}">
                                        <div class="text-tiny">Products</div>
                                    </a>
                                </li>
                                <li>
                                    <i class="icon-chevron-right"></i>
                                </li>
                                <li>
                                    <div class="text-tiny">Add product</div>
                                </li>
                            </ul>
                        </div>
                        <!-- form-add-product -->
                        @if ($errors->any())
                            <div class="alert alert-danger mb-4 p-3 rounded" style="background: #f8d7da; color: #721c24;">
                                <strong>حدثت أخطاء أثناء إرسال النموذج:</strong>
                                <ul class="mt-2 mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data"
                            action="{{route('store_products')}}">
                            @csrf

                            <div class="wg-box">
                                <fieldset class="name">
                                    <div class="body-title mb-10">Product name <span class="tf-color-1">*</span>
                                    </div>
                                    <input class="mb-10" type="text" placeholder="Enter product name" name="name"
                                        tabindex="0" value="" aria-required="true" required="">
                                    <div class="text-tiny">Do not exceed 100 characters when entering the
                                        product name.</div>
                                </fieldset>

                                <fieldset class="name">
                                    <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                                    <input class="mb-10" type="text" placeholder="Enter product slug" name="slug"
                                        tabindex="0" value="" aria-required="true" required="">
                                    <div class="text-tiny">Do not exceed 100 characters when entering the
                                        product name.</div>
                                </fieldset>

                                <div class="gap22 cols">
                                    <fieldset class="category">
                                        <div class="body-title mb-10">Category <span class="tf-color-1">*</span>
                                        </div>
                                        <div class="select">
                                            <select name="category_id" required>
                                                <option value="">-- choose category name --</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </fieldset>
                                    <fieldset class="brand">
                                        <div class="body-title mb-10">Sub category <span class="tf-color-1">*</span>
                                        </div>
                                        <div class="select">
                                            <select name="subcategory_id" required>
                                                <option value="">-- choose sub category name --</option>
                                                @foreach ($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}" {{ old('category_id') == $subcategory->id ? 'selected' : '' }}>
                                                        {{ $subcategory->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </fieldset>
                                </div>
                                <fieldset class="name">
                                    <div class="body-title mb-10">Meta Title<span class="tf-color-1">*</span>
                                    </div>
                                    <input class="mb-10" type="text" placeholder="Enter Meta Title" name="meta_title"
                                        tabindex="0" value="" aria-required="true" required="">
                                    <div class="text-tiny">Do not exceed 100 characters when entering the
                                        Meta Title.</div>
                                </fieldset>
                                <fieldset class="shortdescription">
                                    <div class="body-title mb-10">Meta Description<span class="tf-color-1">*</span></div>
                                    <textarea class="mb-10 ht-150" name="meta_description" placeholder="meta title"
                                        tabindex="0" aria-required="true" required=""></textarea>
                                    <div class="text-tiny">Do not exceed 100 characters when entering the
                                        Meta title.</div>
                                </fieldset>
                                <fieldset class="shortdescription">
                                    <div class="body-title mb-10">Short Description <span class="tf-color-1">*</span></div>
                                    <textarea class="mb-10 ht-150" name="short_description" placeholder="Short Description"
                                        tabindex="0" aria-required="true" required=""></textarea>
                                    <div class="text-tiny">Do not exceed 100 characters when entering the
                                        short description.</div>
                                </fieldset>

                                <fieldset class="description">
                                    <div class="body-title mb-10">Description <span class="tf-color-1">*</span>
                                    </div>
                                    <textarea class="mb-10" name="description" placeholder="Description" tabindex="0"
                                        aria-required="true" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="wg-box">
                                <fieldset>
                                    <div class="body-title">Upload images <span class="tf-color-1">*</span>
                                    </div>
                                    <div class="upload-image flex-grow">
                                        <div class="item" id="imgpreview" style="display:none">
                                            <img src="../../../localhost_8000/images/upload/upload-1.png" class="effect8"
                                                alt="">
                                        </div>
                                        <div id="upload-file" class="item up-load">
                                            <label class="uploadfile" for="myFile">
                                                <span class="icon">
                                                    <i class="icon-upload-cloud"></i>
                                                </span>
                                                <span class="body-text">Drop your images here or select <span
                                                        class="tf-color">click to browse</span></span>
                                                <input type="file" id="myFile" name="image" accept="image/*">
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="body-title mb-10">Upload Gallery Images</div>
                                    <div class="upload-image mb-16">
                                        <div id="galUpload" class="item up-load">
                                            <label class="uploadfile" for="gFile">
                                                <span class="icon">
                                                    <i class="icon-upload-cloud"></i>
                                                </span>
                                                <span class="text-tiny">Drop your images here or select <span
                                                        class="tf-color">click to browse</span></span>
                                                <input type="file" id="gFile" name="gallery[]" accept="image/*" multiple="">
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="cols gap22">
                                    <fieldset class="name">
                                        <div class="body-title mb-10"> Price <span class="tf-color-1">*</span></div>
                                        <input class="mb-10" type="text" placeholder="Enter  price" name="price"
                                            tabindex="0" value="" aria-required="true" required="">
                                    </fieldset>
                                    <fieldset class="name">
                                        <div class="body-title mb-10">Sale Price <span class="tf-color-1">*</span></div>
                                        <input class="mb-10" type="text" placeholder="Enter sale price" name="sale_price"
                                            tabindex="0" value="" aria-required="true" required="">
                                    </fieldset>
                                    <fieldset class="name">
                                        <div class="body-title mb-10">Cost Price <span class="tf-color-1">*</span>
                                        </div>
                                        <input class="mb-10" type="text" placeholder="Enter Cost Price" name="cost_price"
                                            tabindex="0" value="" aria-required="true" required="">
                                    </fieldset>
                                </div>


                                <div class="cols gap22">
                                    <fieldset class="name">
                                        <div class="body-title mb-10">SKU <span class="tf-color-1">*</span>
                                        </div>
                                        <input class="mb-10" type="text" placeholder="Enter SKU" name="sku" tabindex="0"
                                            value="" aria-required="true" required="">
                                    </fieldset>

                                    <fieldset class="name">
                                        <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span>
                                        </div>
                                        <input class="mb-10" type="text" placeholder="Enter quantity" name="stock_quantity"
                                            tabindex="0" value="" aria-required="true" required="">
                                    </fieldset>
                                    <fieldset class="name">
                                        <div class="body-title mb-10"> Minimm Quantity <span class="tf-color-1">*</span>
                                        </div>
                                        <input class="mb-10" type="text" placeholder="Enter minimum quantity"
                                            name="min_quantity" tabindex="0" value="" aria-required="true" required="">
                                    </fieldset>
                                    <fieldset class="name">
                                        <div class="body-title mb-10">is Active</div>
                                        <div class="select mb-10">
                                            <select class="" name="is_active">
                                                <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Not
                                                    Active</option>
                                            </select>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="cols gap22">
                                    <fieldset class="name">
                                        <div class="body-title mb-10">Stock</div>
                                        <div class="select mb-10">
                                            <select class="" name="stock_status">
                                                <option value="in_stock" {{ old('stock_status') == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                                                <option value="out_of_stock" {{ old('stock_status') == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
                                                <option value="on_backorder" {{ old('stock_status') == 'on_backorder' ? 'selected' : '' }}>On Backorder</option>
                                            </select>
                                        </div>
                                    </fieldset>
                                    <fieldset class="name">
                                        <div class="body-title mb-10">Featured</div>
                                        <div class="select mb-10">
                                            <select class="" name="is_featured">
                                                <option value="0" {{ old('featured') == '0' ? 'selected' : '' }}>No</option>
                                                <option value="1" {{ old('featured') == '1' ? 'selected' : '' }}>Yes</option>
                                            </select>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="cols gap10">
                                    <button class="tf-button w-full" type="submit">Add product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
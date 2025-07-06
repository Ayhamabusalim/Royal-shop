@extends('backend.layout.master')
@section('main')
    <div>
        <div class="section-content-right">

            <div class="header-dashboard">
                <div class="wrap">
                    <div class="header-left">
                        <a href="index-2.html">
                            <img class="" id="logo_header_mobile" alt="" src="images/logo/logo.png"
                                data-light="images/logo/logo.png" data-dark="images/logo/logo.png" data-width="154px"
                                data-height="52px" data-retina="images/logo/logo.png">
                        </a>
                        <div class="button-show-hide">
                            <i class="icon-menu-left"></i>
                        </div>


                        <form class="form-search flex-grow">
                            <fieldset class="name">
                                <input type="text" placeholder="Search here..." class="show-search" name="name" tabindex="2"
                                    value="" aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                            <div class="box-content-search" id="box-content-search">
                                <ul class="mb-24">
                                    <li class="mb-14">
                                        <div class="body-title">Top selling product</div>
                                    </li>
                                    <li class="mb-14">
                                        <div class="divider"></div>
                                    </li>
                                    <li>
                                        <ul>
                                            <li class="product-item gap14 mb-10">
                                                <div class="image no-bg">
                                                    <img src="images/products/17.png" alt="">
                                                </div>
                                                <div class="flex items-center justify-between gap20 flex-grow">
                                                    <div class="name">
                                                        <a href="product-list.html" class="body-text">Dog Food
                                                            Rachael Ray Nutrish®</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-10">
                                                <div class="divider"></div>
                                            </li>
                                            <li class="product-item gap14 mb-10">
                                                <div class="image no-bg">
                                                    <img src="images/products/18.png" alt="">
                                                </div>
                                                <div class="flex items-center justify-between gap20 flex-grow">
                                                    <div class="name">
                                                        <a href="product-list.html" class="body-text">Natural
                                                            Dog Food Healthy Dog Food</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-10">
                                                <div class="divider"></div>
                                            </li>
                                            <li class="product-item gap14">
                                                <div class="image no-bg">
                                                    <img src="images/products/19.png" alt="">
                                                </div>
                                                <div class="flex items-center justify-between gap20 flex-grow">
                                                    <div class="name">
                                                        <a href="product-list.html" class="body-text">Freshpet
                                                            Healthy Dog Food and Cat</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="">
                                    <li class="mb-14">
                                        <div class="body-title">Order product</div>
                                    </li>
                                    <li class="mb-14">
                                        <div class="divider"></div>
                                    </li>
                                    <li>
                                        <ul>
                                            <li class="product-item gap14 mb-10">
                                                <div class="image no-bg">
                                                    <img src="images/products/20.png" alt="">
                                                </div>
                                                <div class="flex items-center justify-between gap20 flex-grow">
                                                    <div class="name">
                                                        <a href="product-list.html" class="body-text">Sojos
                                                            Crunchy Natural Grain Free...</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-10">
                                                <div class="divider"></div>
                                            </li>
                                            <li class="product-item gap14 mb-10">
                                                <div class="image no-bg">
                                                    <img src="images/products/21.png" alt="">
                                                </div>
                                                <div class="flex items-center justify-between gap20 flex-grow">
                                                    <div class="name">
                                                        <a href="product-list.html" class="body-text">Kristin
                                                            Watson</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-10">
                                                <div class="divider"></div>
                                            </li>
                                            <li class="product-item gap14 mb-10">
                                                <div class="image no-bg">
                                                    <img src="images/products/22.png" alt="">
                                                </div>
                                                <div class="flex items-center justify-between gap20 flex-grow">
                                                    <div class="name">
                                                        <a href="product-list.html" class="body-text">Mega
                                                            Pumpkin Bone</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-10">
                                                <div class="divider"></div>
                                            </li>
                                            <li class="product-item gap14">
                                                <div class="image no-bg">
                                                    <img src="images/products/23.png" alt="">
                                                </div>
                                                <div class="flex items-center justify-between gap20 flex-grow">
                                                    <div class="name">
                                                        <a href="product-list.html" class="body-text">Mega
                                                            Pumpkin Bone</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </form>

                    </div>
                    <div class="header-grid">

                        <div class="popup-wrap message type-header">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="header-item">
                                        <span class="text-tiny">1</span>
                                        <i class="icon-bell"></i>
                                    </span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end has-content"
                                    aria-labelledby="dropdownMenuButton2">
                                    <li>
                                        <h6>Notifications</h6>
                                    </li>
                                    <li>
                                        <div class="message-item item-1">
                                            <div class="image">
                                                <i class="icon-noti-1"></i>
                                            </div>
                                            <div>
                                                <div class="body-title-2">Discount available</div>
                                                <div class="text-tiny">Morbi sapien massa, ultricies at rhoncus
                                                    at, ullamcorper nec diam</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-item item-2">
                                            <div class="image">
                                                <i class="icon-noti-2"></i>
                                            </div>
                                            <div>
                                                <div class="body-title-2">Account has been verified</div>
                                                <div class="text-tiny">Mauris libero ex, iaculis vitae rhoncus
                                                    et</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-item item-3">
                                            <div class="image">
                                                <i class="icon-noti-3"></i>
                                            </div>
                                            <div>
                                                <div class="body-title-2">Order shipped successfully</div>
                                                <div class="text-tiny">Integer aliquam eros nec sollicitudin
                                                    sollicitudin</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-item item-4">
                                            <div class="image">
                                                <i class="icon-noti-4"></i>
                                            </div>
                                            <div>
                                                <div class="body-title-2">Order pending: <span>ID 305830</span>
                                                </div>
                                                <div class="text-tiny">Ultricies at rhoncus at ullamcorper</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="#" class="tf-button w-full">View all</a></li>
                                </ul>
                            </div>
                        </div>




                        <div class="popup-wrap user type-header">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="header-user wg-user">
                                        <span class="image">
                                            <img src="images/avatar/user-1.png" alt="">
                                        </span>
                                        <span class="flex flex-column">
                                            <span class="body-title mb-2">Kristin Watson</span>
                                            <span class="text-tiny">Admin</span>
                                        </span>
                                    </span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end has-content"
                                    aria-labelledby="dropdownMenuButton3">
                                    <li>
                                        <a href="#" class="user-item">
                                            <div class="icon">
                                                <i class="icon-user"></i>
                                            </div>
                                            <div class="body-title-2">Account</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="user-item">
                                            <div class="icon">
                                                <i class="icon-mail"></i>
                                            </div>
                                            <div class="body-title-2">Inbox</div>
                                            <div class="number">27</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="user-item">
                                            <div class="icon">
                                                <i class="icon-file-text"></i>
                                            </div>
                                            <div class="body-title-2">Taskboard</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="user-item">
                                            <div class="icon">
                                                <i class="icon-headphones"></i>
                                            </div>
                                            <div class="body-title-2">Support</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="login.html" class="user-item">
                                            <div class="icon">
                                                <i class="icon-log-out"></i>
                                            </div>
                                            <div class="body-title-2">Log out</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="main-content">

                <!-- main-content-wrap -->
                <div class="main-content-inner">
                    <!-- main-content-wrap -->
                    <div class="main-content-wrap">
                        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                            <h3>Edit Product</h3>
                            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                <li>
                                    <a href="index-2.html">
                                        <div class="text-tiny">Dashboard</div>
                                    </a>
                                </li>
                                <li>
                                    <i class="icon-chevron-right"></i>
                                </li>
                                <li>
                                    <a href="all-product.html">
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
                       <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data"action="{{ route('products.update', $product->id) }}">
                             @csrf
                             @method('PUT')

                             <div class="wg-box">
        <fieldset class="name">
            <div class="body-title mb-10">Product name <span class="tf-color-1">*</span></div>
            <input class="mb-10" type="text" placeholder="Enter product name" name="name"
                value="{{ old('name', $product->name) }}" required>
            <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
        </fieldset>

        <fieldset class="name">
            <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
            <input class="mb-10" type="text" placeholder="Enter product slug" name="slug"
                value="{{ old('slug', $product->slug) }}" required>
            <div class="text-tiny">Do not exceed 100 characters when entering the product slug.</div>
        </fieldset>

        <div class="gap22 cols">
            <fieldset class="category">
                <div class="body-title mb-10">Category <span class="tf-color-1">*</span></div>
                <div class="select">
                    <select name="category_id" required>
                        <option value="">-- choose category name --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </fieldset>

            <fieldset class="brand">
                <div class="body-title mb-10">Sub category <span class="tf-color-1">*</span></div>
                <div class="select">
                    <select name="subcategory_id" required>
                        <option value="">-- choose sub category name --</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}"
                                {{ old('subcategory_id', $product->subcategory_id) == $subcategory->id ? 'selected' : '' }}>
                                {{ $subcategory->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </fieldset>
        </div>

        <fieldset class="name">
            <div class="body-title mb-10">Meta Title<span class="tf-color-1">*</span></div>
            <input class="mb-10" type="text" placeholder="Enter Meta Title" name="meta_title"
                value="{{ old('meta_title', $product->meta_title) }}" required>
        </fieldset>

        <fieldset class="shortdescription">
            <div class="body-title mb-10">Meta Description<span class="tf-color-1">*</span></div>
            <textarea class="mb-10 ht-150" name="meta_description" required>{{ old('meta_description', $product->meta_description) }}</textarea>
        </fieldset>

        <fieldset class="shortdescription">
            <div class="body-title mb-10">Short Description <span class="tf-color-1">*</span></div>
            <textarea class="mb-10 ht-150" name="short_description" required>{{ old('short_description', $product->short_description) }}</textarea>
        </fieldset>

        <fieldset class="description">
            <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
            <textarea class="mb-10" name="description" required>{{ old('description', $product->description) }}</textarea>
        </fieldset>
                             </div>

                             <div class="wg-box">
        <fieldset>
            <div class="body-title">Upload image <span class="tf-color-1">*</span></div>
            <div class="upload-image flex-grow">
                @if($product->image)
                    <div class="item">
                        <img src="{{ asset('images/products/' . $product->image) }}" class="effect8"
                            style="max-height: 100px;" alt="Current Image">
                    </div>
                @endif
                <div id="upload-file" class="item up-load">
                    <label class="uploadfile" for="myFile">
                        <span class="icon"><i class="icon-upload-cloud"></i></span>
                        <span class="body-text">Drop your image or <span class="tf-color">click to browse</span></span>
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
                        <span class="icon"><i class="icon-upload-cloud"></i></span>
                        <span class="text-tiny">Drop your images here or <span class="tf-color">click to browse</span></span>
                        <input type="file" id="gFile" name="gallery[]" accept="image/*" multiple>
                    </label>
                </div>
            </div>
        </fieldset>

        <div class="cols gap22">
            <fieldset class="name">
                <div class="body-title mb-10">Price <span class="tf-color-1">*</span></div>
                <input class="mb-10" type="text" placeholder="Enter price" name="price"
                    value="{{ old('price', $product->price) }}" required>
            </fieldset>

            <fieldset class="name">
                <div class="body-title mb-10">Sale Price <span class="tf-color-1">*</span></div>
                <input class="mb-10" type="text" placeholder="Enter sale price" name="sale_price"
                    value="{{ old('sale_price', $product->sale_price) }}" required>
            </fieldset>

            <fieldset class="name">
                <div class="body-title mb-10">Cost Price <span class="tf-color-1">*</span></div>
                <input class="mb-10" type="text" placeholder="Enter Cost Price" name="cost_price"
                    value="{{ old('cost_price', $product->cost_price) }}" required>
            </fieldset>
        </div>

        <div class="cols gap22">
            <fieldset class="name">
                <div class="body-title mb-10">SKU <span class="tf-color-1">*</span></div>
                <input class="mb-10" type="text" placeholder="Enter SKU" name="sku"
                    value="{{ old('sku', $product->sku) }}" required>
            </fieldset>

            <fieldset class="name">
                <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span></div>
                <input class="mb-10" type="text" placeholder="Enter quantity" name="stock_quantity"
                    value="{{ old('stock_quantity', $product->stock_quantity) }}" required>
            </fieldset>

            <fieldset class="name">
                <div class="body-title mb-10">Minimum Quantity <span class="tf-color-1">*</span></div>
                <input class="mb-10" type="text" placeholder="Enter minimum quantity" name="min_quantity"
                    value="{{ old('min_quantity', $product->min_quantity) }}" required>
            </fieldset>

            <fieldset class="name">
                <div class="body-title mb-10">Is Active</div>
                <div class="select mb-10">
                    <select name="is_active">
                        <option value="1" {{ old('is_active', $product->is_active) == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active', $product->is_active) == '0' ? 'selected' : '' }}>Not Active</option>
                    </select>
                </div>
            </fieldset>
        </div>

        <div class="cols gap22">
            <fieldset class="name">
                <div class="body-title mb-10">Stock</div>
                <div class="select mb-10">
                    <select name="stock_status">
                        <option value="in_stock" {{ old('stock_status', $product->stock_status) == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                        <option value="out_of_stock" {{ old('stock_status', $product->stock_status) == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
                        <option value="on_backorder" {{ old('stock_status', $product->stock_status) == 'on_backorder' ? 'selected' : '' }}>On Backorder</option>
                    </select>
                </div>
            </fieldset>

            <fieldset class="name">
                <div class="body-title mb-10">Featured</div>
                <div class="select mb-10">
                    <select name="is_featured">
                        <option value="0" {{ old('is_featured', $product->is_featured) == '0' ? 'selected' : '' }}>No</option>
                        <option value="1" {{ old('is_featured', $product->is_featured) == '1' ? 'selected' : '' }}>Yes</option>
                    </select>
                </div>
            </fieldset>
        </div>

        <div class="cols gap10">
            <button class="tf-button w-full" type="submit">Update Product</button>
        </div>
                             </div>
                       </form>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
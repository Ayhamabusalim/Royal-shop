@extends('backend.layout.master')
@section('main')
    <div class="main-content">

        <div class="main-content-inner">
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>All Products</h3>
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
                            <div class="text-tiny">All Products</div>
                        </li>
                    </ul>
                </div>

                <div class="wg-box">
                    <div class="flex items-center justify-between gap10 flex-wrap">
                        <div class="wg-filter flex-grow">
                            <form class="form-search">
                                <fieldset class="name">
                                    <input type="text" placeholder="Search here..." class="" name="name" tabindex="2"
                                        value="" aria-required="true" required="">
                                </fieldset>
                                <div class="button-submit">
                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <a class="tf-button style-1 w208" href="{{route('add_products')}}"><i class="icon-plus"></i>Add
                            new</a>
                    </div>


                    <div class="wg-table table-all-user">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>SalePrice</th>
                                    <th>SKU</th>
                                    <th>Stock</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Products as $product)
                                    <tr>
                                        <td>
                                            <div style="display: flex; align-items: center; gap: 10px;">
                                                <img src="{{ asset('images/categories/' . $product->category->image) }}" alt=""
                                                    style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px;" />
                                                <span style="font-size: 14px;">{{ $product->category->name }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="display: flex; align-items: center; gap: 10px;">
                                                <img src="{{ asset('images/subcategories/' . $product->subcategory->image) }}"
                                                    alt=""
                                                    style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px;" />
                                                <span style="font-size: 14px;">{{ $product->subcategory->name }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="display: flex; align-items: center; gap: 10px;">
                                                <img src="{{ asset('images/products/' . $product->image) }}" alt=""
                                                    style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px;" />
                                                <span style="font-size: 14px;">{{ $product->name }}</span>
                                            </div>
                                        </td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->sale_price}}</td>
                                        <td>{{$product->sku}}</td>
                                        <td>{{$product->stock_status}}</td>
                                        <td>{{$product->stock_quantity}}</td>
                                        <td>
                                            <div class="list-icon-function">
                                                <a href="{{route('edit_products', $product->id)}}">
                                                    <div class="item edit">
                                                        <i class="icon-edit-3"></i>
                                                    </div>
                                                </a>
                                                <form action="{{ route('delete_products', $product->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this product?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="item text-danger delete"
                                                        style="background: none; border: none; padding: 0;">
                                                        <i class="icon-trash-2"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="divider"></div>
                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination"></div>
                </div>

                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">


                </div>
            </div>
        </div>
    </div>


    </div>
@endsection
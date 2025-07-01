@extends('backend.layout.master')
@section('main')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>Sub Categories</h3>
                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                        <li>
                            <a href="index.html">
                                <div class="text-tiny">Dashboard</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <div class="text-tiny">Sub Categories</div>
                        </li>
                    </ul>
                </div>

                <div class="wg-box">
                    <div class="flex items-center justify-between gap10 flex-wrap">
                        <div class="wg-filter flex-grow">
                            <form class="form-search">
                                <fieldset class="name">
                                    <input type="text" placeholder="Search here..." class="" name="name" tabindex="2"
                                        value="" aria-required="true" required="" />
                                </fieldset>
                                <div class="button-submit">
                                    <button class="" type="submit">
                                        <i class="icon-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <a class="tf-button style-1 w208" href="{{route('subcategories.create')}}"><i
                                class="icon-plus"></i>Add
                            new</a>
                    </div>
                    <div class="wg-table table-all-user">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subCategories as $sub)


                                    <tr>

                                        <td>
                                            <div style="display: flex; align-items: center; gap: 10px;">
                                                <img src="{{ asset('image/' . $sub->category->image) }}" alt=""
                                                    style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px;" />
                                                <span style="font-size: 14px;">{{ $sub->category->name }}</span>
                                            </div>
                                        </td>

                                        <td>
                                            <div style="display: flex; align-items: center; gap: 10px;">
                                                <img src="{{ asset('image/' . $sub->image) }}" alt=""
                                                    style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px;" />
                                                <span style="font-size: 14px;">{{ $sub->name }}</span>
                                            </div>
                                        </td>
                                        <td>{{$sub->slug}}</td>
                                        <td>{{$sub->description}}</td>
                                        <td>{{$sub->created_at}}</td>
                                        <td>{{$sub->updated_at}}</td>
                                        <td>
                                            <div class="list-icon-function">
                                                <a href="{{route('subcategories.edit', $sub->id)}}">
                                                    <div class="item edit">
                                                        <i class="icon-edit-3"></i>
                                                    </div>
                                                </a>
                                                <form action="{{ route('subcategories.destroy', $sub->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this Sub category?')">
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
            </div>
        </div>

        <div class="bottom-page">
            <div class="body-text">Copyright © 2024 SurfsideMedia</div>
        </div>
    </div>
@endsection
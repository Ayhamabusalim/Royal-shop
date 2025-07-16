@extends('backend.layout.master')
@section('main')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>Categories</h3>
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
                            <div class="text-tiny">Categories</div>
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
                        <a class="tf-button style-1 w208" href="{{route('create_category')}}"><i class="icon-plus"></i>Add
                            new</a>
                    </div>
                    <div class="wg-table table-all-user">
                        <<table class="table table-striped table-bordered" id="categories_table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            </table>

                    </div>
                    <div class="divider"></div>
                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination"></div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script src="{{asset('asset/categories.js')}}"></script>
    @endpush
@endsection
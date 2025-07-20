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
                        </div>
                        <button type="button" class="btn btn-primary mb-3 tf-button style-1 w208" data-bs-toggle="modal"
                            data-bs-target="#ModelCreateCategory">
                            Add new Category
                        </button>
                    </div>
                    <div class="table-responsive">
                        {!! $dataTable->table(['class' => 'table table-bordered table-striped table-hover align-middle w-100'], true) !!}

                    </div>
                    <div class="divider"></div>
                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination"></div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.pages.category.component.create_category')
    @include('backend.pages.category.component.edit_category')
    @push('script')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
        <script src="{{asset('assets/js/backend/categories.js')}}"></script>

    @endpush
@endsection
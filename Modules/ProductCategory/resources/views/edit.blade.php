@extends('admin.master_layout')

@section('title')
    <title>{{ __('ProductCategory List') }}</title>
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('ProductCategory List') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.product-category.index') }}">{{ __('ProductCategory List') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Edit ProductCategory') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Edit ProductCategory') }}</h4>
                                <div>
                                    <a href="{{ route('admin.product-category.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i>{{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.product-category.update', $data->id) }}" method="post" enctype="multipart/form-data" >
                                    @csrf
                                    @method("PUT")
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="">
                                                <div class="form-group">
                                                    <label for="title">{{ __('category') }}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" id="category" name="category"
                                                        value="{{ old('category', $data->category) }}" placeholder="Enter category"
                                                        class="form-control">
                                                    @error('category')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>



                                            <x-admin.save-button :text="__('admin.Update')" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@extends('admin.master_layout')

@section('title')
    <title>{{ __('Test List') }}</title>
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Test List') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.test.index') }}">{{ __('Test List') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Add Category') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Add Category') }}</h4>
                                <div>
                                    <a href="{{ route('admin.test.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i>{{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.test.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="">
                                                <div class="form-group">
                                                    <label for="title">{{ __('category') }}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" id="category" name="category"
                                                        value="{{ old('category') }}" placeholder="Enter category"
                                                        class="form-control">
                                                    @error('category')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="">
                                                <div class="form-group">
                                                    <label for="title">{{ __('slug') }}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" id="slug" name="slug"
                                                        value="{{ old('slug') }}" placeholder="Enter slug"
                                                        class="form-control">
                                                    @error('slug')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="">
                                                <div class="form-group">
                                                    <label for="title">{{ __('status') }}<span
                                                            class="text-danger">*</span></label>
                                                    <select name="status" class="form-control">
<option value="1" >Active</option>
<option value="0" >Inactive</option>

                                                    </select>
                                                    @error('status')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="">
                                                <div class="form-group">
                                                    <label for="title">{{ __('description') }}<span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="description" class="form-control" ></textarea>
                                                    @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>



                                            <x-admin.save-button :text="__('admin.Save')">
                                            </x-admin.save-button>
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

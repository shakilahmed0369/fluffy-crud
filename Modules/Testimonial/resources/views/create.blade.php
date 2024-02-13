@extends('admin.master_layout')

@section('title')
    <title>{{ __('Testimonial List') }}</title>
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Testimonial List') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.testimonial.index') }}">{{ __('Testimonial List') }}</a>
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
                                    <a href="{{ route('admin.testimonial.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i>{{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.testimonial.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="">
                                                <div class="form-group">
                                                    <label for="title">{{ __('name') }}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" id="name" name="name"
                                                        value="{{ old('name', ) }}" placeholder="Enter name"
                                                        class="form-control">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="">
                                                <div class="form-group">
                                                    <label for="title">{{ __('title') }}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" id="title" name="title"
                                                        value="{{ old('title', ) }}" placeholder="Enter title"
                                                        class="form-control">
                                                    @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="">
                                                <div class="form-group">
                                                    <label for="title">{{ __('review') }}<span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="review" class="form-control" >  </textarea>
                                                    @error('review')
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

@extends('admin.master_layout')
@section('title')
    <title>{{ __('admin.Testimonials') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('admin.Testimonials') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('admin.Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.testimonial.index') }}">{{ __('admin.Testimonials') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('admin.Create Testimonial') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('admin.Create Testimonial') }}</h4>
                                <div>
                                    <a href="{{ route('admin.testimonial.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('admin.Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.testimonial.store') }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="offset-md-2 col-md-8">
                                            <div class="form-group">
                                                <label for="name">{{ __('admin.Name') }} <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="{{ __('admin.Enter Name') }}" value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="offset-md-2 col-md-8">
                                            <div class="form-group">
                                                <label for="designation">{{ __('admin.Designation') }} <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="designation"
                                                    id="designation" placeholder="{{ __('admin.Enter designation') }}"
                                                    value="{{ old('designation') }}">
                                                @error('designation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="offset-md-2 col-md-8">
                                            <div class="form-group">
                                                <label for="comment">{{ __('admin.Comment') }} <span class="text-danger">*</span></label>
                                                <textarea name="comment" id="comment" cols="30" rows="10" class="form-control text-area-5" placeholder="{{ __('admin.Enter comment') }}">{{ old('comment') }}</textarea>
                                                @error('comment')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="offset-md-2 col-md-8">
                                            <div class="form-group">
                                                <label for="rating">{{ __('admin.Rating') }}</label>
                                                <input type="number" min="0" max="5" step=".1" class="form-control" name="rating" id="rating" placeholder="{{ __('admin.Enter rating 0-5') }}" value="{{ old('rating') }}">
                                                @error('rating')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="offset-md-2 col-md-8">
                                            <div class="form-group">
                                                <label>{{ __('admin.Image') }}</label>
                                                <div id="image-preview" class="image-preview">
                                                    <label for="image-upload" id="image-label">{{ __('admin.Image') }}</label>
                                                    <input type="file" name="image" id="image-upload">
                                                </div>
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-center offset-md-2 col-md-8">
                                            <x-admin.save-button :text="__('admin.Save')" />
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

@push('js')
    <script src="{{ asset('backend/js/jquery.uploadPreview.min.js') }}"></script>
    <script>
        "use strict";
        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview",
            label_field: "#image-label",
            label_default: "{{ __('admin.Choose Image') }}",
            label_selected: "{{ __('admin.Change Image') }}",
            no_label: false,
            success_callback: null
        });
    </script>
@endpush

@push('css')
    <style>
        .image-preview label,
        #callback-preview label {
            top: 170px !important;
            color: white !important;
            background-color: black !important;
        }
    </style>
@endpush

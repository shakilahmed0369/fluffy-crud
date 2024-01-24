@extends('admin.master_layout')
@section('title')
    <title>{{ __('Manage Language') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Manage Language') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.languages.index') }}">{{ __('Manage Language') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Create Languages') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Create Language') }}</h4>
                                <div>
                                    <a href="{{ route('admin.languages.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>{{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.languages.store') }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="offset-md-3 col-md-6">
                                            <div class="form-group">
                                                <label for="name">{{ __('Name') }}</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('Enter Name') }}" value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="offset-md-3 col-md-6">
                                            <div class="form-group">
                                                <label for="code">{{ __('Code') }}</label>
                                                <input type="text" class="form-control" name="code" id="code" placeholder="{{ __('Enter Code') }}" value="{{ old('code') }}">
                                                @error('code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="offset-md-3 col-md-6">
                                            <div class="form-group">
                                                <label for="direction">{{ __('Direction') }}</label>
                                                <select class="form-control" name="direction" id="direction">
                                                    <option value="ltr" @selected(old('direction') == 'ltr')>{{ __('Left To Right') }}</option>
                                                    <option value="rtl" @selected(old('direction') == 'rtl')>{{ __('Right to Left') }}</option>
                                                </select>
                                                @error('direction')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="offset-md-3 col-md-6">
                                            <div class="form-group">
                                                <label>{{ __('Icon') }}</label>
                                                <div id="image-preview" class="image-preview">
                                                    <label for="image-upload" id="image-label">{{ __('Icon') }}</label>
                                                    <input type="file" name="icon" id="image-upload">
                                                </div>
                                                @error('icon')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-center offset-md-3 col-md-6">
                                            <x-admin.save-button :text="__('admin.Save')"/>
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
        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview",
            label_field: "#image-label",
            label_default: "{{ __('Choose Icon') }}",
            label_selected: "{{ __('Change Icon') }}",
            no_label: false,
            success_callback: null
        });
    </script>
@endpush

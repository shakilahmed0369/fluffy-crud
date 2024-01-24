@extends('admin.master_layout')
@section('title')
<title>{{ __('admin.Facebook Pixel') }}</title>
@endsection
@section('admin-content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Facebook Pixel') }}</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-facebook-pixel') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="">{{ __('Status') }}</label>
                                        <select name="pixel_status" id="tawk_allow" class="form-control">
                                            <option {{ $setting->pixel_status == 'active' ? 'selected' : '' }} value="active">{{ __('admin.Enable') }}</option>
                                            <option {{ $setting->pixel_status == 'inactive' ? 'selected' : '' }} value="inactive">{{ __('admin.Disable') }}</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Facebook App Id') }}</label>
                                        @if (env('APP_MODE') == 'DEMO')
                                            <input type="text" value="PIXEL-APP-434334-DEMO-ID" class="form-control" name="pixel_app_id">
                                        @else
                                            <input type="text" value="{{ $setting->pixel_app_id }}" class="form-control" name="pixel_app_id">
                                        @endif


                                    </div>
                                    <button class="btn btn-primary">{{ __('admin.Update') }}</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
  </div>

@endsection

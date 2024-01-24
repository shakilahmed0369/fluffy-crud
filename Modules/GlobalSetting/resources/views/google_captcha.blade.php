@extends('admin.master_layout')
@section('title')
<title>{{ __('admin.Google reCaptcha') }}</title>
@endsection
@section('admin-content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Google reCaptcha') }}</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-google-captcha') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">{{ __('Status') }}</label>
                                    <select name="recaptcha_status" id="recaptcha_status" class="form-control">
                                        <option {{ $setting->recaptcha_status == 'active' ? 'selected' : '' }} value="active">{{ __('admin.Enable') }}</option>
                                        <option {{ $setting->recaptcha_status == 'inactive' ? 'selected' : '' }} value="inactive">{{ __('admin.Disable') }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('admin.Captcha Site Key') }}</label>
                                    @if (env('APP_MODE') == 'DEMO')
                                        <input type="text" class="form-control" name="recaptcha_site_key" value="ZXN39334XKF-SITE-KEY-TEST">
                                    @else
                                        <input type="text" class="form-control" name="recaptcha_site_key" value="{{ $setting->recaptcha_site_key }}">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('admin.Captcha Secret Key') }}</label>
                                    @if (env('APP_MODE') == 'DEMO')
                                        <input type="text" class="form-control" name="recaptcha_secret_key" value="ZXN39334XKF-SECRET-KEY-TEST">
                                    @else
                                        <input type="text" class="form-control" name="recaptcha_secret_key" value="{{ $setting->recaptcha_secret_key }}">
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

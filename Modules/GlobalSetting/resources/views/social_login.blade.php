@extends('admin.master_layout')
@section('title')
<title>{{ __('admin.Social Login') }}</title>
@endsection
@section('admin-content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Social Login') }}</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-social-login') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="">{{ __('Facebook Status') }}</label>
                                        <select name="facebook_login_status" id="tawk_allow" class="form-control">
                                            <option {{ $setting->facebook_login_status == 'active' ? 'selected' : '' }} value="active">{{ __('admin.Enable') }}</option>
                                            <option {{ $setting->facebook_login_status == 'inactive' ? 'selected' : '' }} value="inactive">{{ __('admin.Disable') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('admin.Facebook App Id') }}</label>
                                    @if (env('APP_MODE') == 'DEMO')
                                        <input type="text" value="APP-DEMO-9348934-ID" class="form-control" name="facebook_app_id">
                                    @else
                                        <input type="text" value="{{ $setting->facebook_app_id }}" class="form-control" name="facebook_app_id">
                                    @endif

                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('admin.Facebook App Secret') }}</label>
                                    @if (env('APP_MODE') == 'DEMO')
                                        <input type="text" value="APP-ID-SECRET-39343434" class="form-control" name="facebook_app_secret">
                                    @else
                                        <input type="text" value="{{ $setting->facebook_app_secret }}" class="form-control" name="facebook_app_secret">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('admin.Facebook Redirect Url') }}</label>
                                    <input type="text" value="{{ $setting->facebook_redirect_url}}" class="form-control" name="facebook_redirect_url">
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="">{{ __('Google Status') }}</label>
                                        <select name="google_login_status" id="tawk_allow" class="form-control">
                                            <option {{ $setting->google_login_status == 'active' ? 'selected' : '' }} value="active">{{ __('admin.Enable') }}</option>
                                            <option {{ $setting->google_login_status == 'inactive' ? 'selected' : '' }} value="inactive">{{ __('admin.Disable') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('admin.Gmail Client Id') }}</label>
                                    @if (env('APP_MODE') == 'DEMO')
                                        <input type="text" value="GMAIL-ID-34343-DEMO-CLIENT" class="form-control" name="gmail_client_id">
                                    @else
                                        <input type="text" value="{{ $setting->gmail_client_id }}" class="form-control" name="gmail_client_id">
                                    @endif

                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('admin.Gmail Secret Id') }}</label>
                                    @if (env('APP_MODE') == 'DEMO')
                                        <input type="text" value="GMAIL-ID-343943-TEST-SECRET" class="form-control" name="gmail_secret_id">
                                    @else
                                        <input type="text" value="{{ $setting->gmail_secret_id }}" class="form-control" name="gmail_secret_id">
                                    @endif

                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('admin.Gmail Redirect Url') }}</label>
                                    <input type="text" value="{{ $setting->gmail_redirect_url }}" class="form-control" name="gmail_redirect_url">
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

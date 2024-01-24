@extends('admin.master_layout')
@section('title')
<title>{{ __('admin.Cookie Consent') }}</title>
@endsection
@section('admin-content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Cookie Consent') }}</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-cookie-consent') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ __('Status') }}</label>
                                            <select name="cookie_status" id="" class="form-control">
                                                <option {{ $setting->cookie_status == 'active' ? 'selected':'' }} value="active">{{ __('admin.Enable') }}</option>
                                                <option {{ $setting->cookie_status == 'inactive' ? 'selected':'' }} value="inactive">{{ __('admin.Disable') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ __('admin.Border') }}</label>
                                            <select name="border" id="" class="form-control">
                                                <option {{ $setting->border=='none' ? 'selected':'' }} value="none">{{ __('admin.None') }}</option>
                                                <option {{ $setting->border=='thin' ? 'selected':'' }} value="thin">{{ __('admin.Thin') }}</option>
                                                <option {{ $setting->border=='normal' ? 'selected':'' }} value="normal">{{ __('admin.Normal') }}</option>
                                                <option {{ $setting->border=='thick' ? 'selected':'' }} value="thick">{{ __('admin.Thick') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ __('admin.Corner') }}</label>
                                            <select name="corners" id="" class="form-control">
                                                <option {{ $setting->corners=='none' ? 'selected':'' }} value="none">{{ __('admin.none') }}</option>
                                                <option {{ $setting->corners=='small' ? 'selected':'' }} value="small">{{ __('admin.Small') }}</option>
                                                <option {{ $setting->corners=='normal' ? 'selected':'' }} value="normal">{{ __('admin.Normall') }}</option>
                                                <option {{ $setting->corners=='large' ? 'selected':'' }} value="large">{{ __('admin.Large') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bg_color">{{ __('admin.Background Color') }}</label>
                                            <input class="form-control" type="color" name="background_color" id="bg_color" value="{{ $setting->background_color }}">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="text_color">{{ __('admin.Text Color') }}</label>
                                            <input class="form-control" type="color" name="text_color" id="text_color" value="{{ $setting->text_color }}">
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="border_color">{{ __('admin.Border Color') }}</label>
                                            <input class="form-control" type="color" name="border_color" id="border_color" value="{{ $setting->border_color }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="btn_bg_color">{{ __('admin.Button Color') }}</label>
                                            <input class="form-control" type="color" name="btn_bg_color" id="btn_bg_color" value="{{ $setting->btn_bg_color }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="btn_text_color">{{ __('admin.Button Text Color') }}</label>
                                            <input class="form-control" type="color" name="btn_text_color" id="btn_text_color" value="{{ $setting->btn_text_color }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ __('admin.Link Text') }}</label>
                                            <input type="text" name="link_text" value="{{ $setting->link_text }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ __('admin.Button Text') }}</label>
                                            <input type="text" name="btn_text" value="{{ $setting->btn_text }}" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="cookie_text">{{ __('admin.Message') }}</label>
                                    <textarea class="form-control text-area-5" name="message" id="cookie_text" cols="30" rows="5">{{ $setting->message }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('admin.Update') }}</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
  </div>

@endsection

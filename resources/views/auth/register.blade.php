@extends('layout')

@section('main-body')
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group inflanar-form-input mg-top-20">
                <label>{{__('admin.Name')}}*</label>
                <input class="ecom-wc__form-input" type="text" name="name" placeholder="{{__('admin.Name')}}" >
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group inflanar-form-input mg-top-20">
                <label>{{__('admin.Email')}}*</label>
                <input class="ecom-wc__form-input" type="text" name="email" placeholder="{{__('admin.Email')}}">
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group inflanar-form-input mg-top-20">
                <label>{{__('admin.Password')}}*</label>
                <input class="ecom-wc__form-input" type="password" name="password" placeholder="{{__('admin.Password')}}">
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group inflanar-form-input mg-top-20">
                <label>{{__('admin.Confirm Password')}}*</label>
                <input class="ecom-wc__form-input" type="password" name="password_confirmation" placeholder="{{__('admin.Confirm Password')}}">
            </div>
        </div>

        <div class="col-12">

            @if($setting->recaptcha_status == 'active')
                <div class="form-group inflanar-form-input mg-top-20">
                    <div class="g-recaptcha" data-sitekey="{{ $setting->recaptcha_site_key }}"></div>
                </div>
            @endif

            <!-- Login Button Group -->
            <div class="form-group mg-top-40">
                <button type="submit" class="inflanar-btn"><span>{{__('admin.Create Account')}}</span></button>
            </div>
            <div class="inflanar-signin__bottom mg-top-20">
                <p class="inflanar-signin__text">{{__('admin.Alread have an account?')}}  <a href="{{ route('login') }}">{{__('admin.Login')}}</a></p>
            </div>
        </div>
    </div>
</form>
@endsection



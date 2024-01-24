
<li class="nav-item dropdown {{ Route::is('admin.general-setting') || Route::is('admin.logo-favicon') || Route::is('admin.cookie-consent') || Route::is('admin.google-captcha') || Route::is('admin.tawk-chat') || Route::is('admin.google-analytic') || Route::is('admin.facebook-pixel') || Route::is('admin.custom-pagination') || Route::is('admin.database-generate') || Route::is('admin.payment-method') || Route::is('admin.social-login') || Route::is('admin.header-footer') || Route::is('admin.default-avatar') || Route::is('admin.breadcrumb') || Route::is('admin.database-clear') || Route::is('admin.seo-setting') || Route::is('admin.currency.*') || Route::is('admin.custom-code*') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>{{ __('admin.General Setting') }}</span></a>

    <ul class="dropdown-menu">
        <li class="{{ Route::is('admin.general-setting') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.general-setting') }}">{{ __('admin.General Setting') }}</a></li>


        @include('currency::sidebar')

        <li class="{{ Route::is('admin.seo-setting') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.seo-setting') }}">{{ __('admin.SEO Setup') }}</a></li>

        <li class="{{ Route::is('admin.logo-favicon') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.logo-favicon') }}">{{ __('admin.Logo & Favicon') }}</a></li>

        <li class="{{ Route::is('admin.cookie-consent') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.cookie-consent') }}">{{ __('admin.Cookie Consent') }}</a></li>

        <li class="{{ Route::is('admin.google-captcha') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.google-captcha') }}">{{ __('admin.Google reCaptcha') }}</a></li>


        <li class="{{ Route::is('admin.tawk-chat') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.tawk-chat') }}">{{ __('admin.Tawk Chat') }}</a></li>

        <li class="{{ Route::is('admin.google-analytic') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.google-analytic') }}">{{ __('admin.Google Analytic') }}</a></li>


        <li class="{{ Route::is('admin.facebook-pixel') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.facebook-pixel') }}">{{ __('admin.Facebook Pixel') }}</a></li>

        <li class="{{ Route::is('admin.social-login') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.social-login') }}">{{ __('admin.Social Login') }}</a></li>

        <li class="{{ Route::is('admin.custom-pagination') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.custom-pagination') }}">{{ __('admin.Custom Pagination') }}</a></li>

        <li class="{{ Route::is('admin.default-avatar') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.default-avatar') }}">{{ __('admin.Default avatar') }}</a></li>

        <li class="{{ Route::is('admin.breadcrumb') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.breadcrumb') }}">{{ __('admin.Breadcrumb image') }}</a></li>

        <li class="{{ Route::is('admin.custom-code') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.custom-code') }}">{{ __('admin.Custom CSS & JS') }}</a></li>

        <li class="{{ Route::is('admin.cache-clear') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.cache-clear') }}">{{ __('admin.Clear cache') }}</a></li>

        <li class="{{ Route::is('admin.database-clear') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.database-clear') }}">{{ __('admin.Database Clear') }}</a></li>

      </ul>
    </li>
  </li>


  <li class="nav-item dropdown {{ Route::is('admin.email-configuration') || Route::is('admin.email-template') || Route::is('admin.edit-email-template') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-envelope"></i><span>{{ __('admin.Email Configuration') }}</span></a>

    <ul class="dropdown-menu">
        <li class="{{ Route::is('admin.email-configuration') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.email-configuration') }}">{{ __('admin.Setting') }}</a></li>

        <li class="{{ Route::is('admin.email-template') || Route::is('admin.edit-email-template') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.email-template') }}">{{ __('admin.Email Template') }}</a></li>
    </ul>
  </li>

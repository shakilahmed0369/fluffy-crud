<li class="nav-item dropdown {{ Route::is('admin.coupon.index') || Route::is('admin.coupon-history')  ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i> <span>{{ __('Manage Coupon') }} </span>

    </a>
    <ul class="dropdown-menu">

        <li class="{{  Route::is('admin.coupon.index') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.coupon.index') }}">{{ __('Coupon List') }}</a></li>

        <li class="{{ Route::is('admin.coupon-history') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.coupon-history') }}">{{ __('Coupon History') }}</a></li>

    </ul>
</li>

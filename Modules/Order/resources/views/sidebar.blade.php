<li class="nav-item dropdown {{ Route::is('admin.orders') || Route::is('admin.order') || Route::is('admin.pending-payment') || Route::is('admin.rejected-payment') || Route::is('admin.pending-orders') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i> <span>{{ __('Manage Order') }} </span>

    </a>
    <ul class="dropdown-menu">
        <li class="{{  Route::is('admin.orders') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.orders') }}">{{ __('Order History') }}</a></li>

        <li class="{{  Route::is('admin.pending-orders') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.pending-orders') }}">{{ __('Pending Order') }}</a></li>


        <li class="{{ Route::is('admin.pending-payment') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.pending-payment') }}">{{ __('Pending Payment') }}</a></li>

        <li class="{{ Route::is('admin.rejected-payment') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.rejected-payment') }}">{{ __('Rejected Payment') }}</a></li>



    </ul>
</li>

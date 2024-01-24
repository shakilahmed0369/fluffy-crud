
<li class="nav-item dropdown {{ Route::is('admin.clubpoint-setting') || Route::is('admin.clubpoint-history') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i> <span>{{ __('Club Point') }} </span>

    </a>
    <ul class="dropdown-menu">

        <li class="{{  Route::is('admin.clubpoint-setting') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.clubpoint-setting') }}">{{ __('Configuration') }}</a></li>

        <li class="{{  Route::is('admin.clubpoint-history') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.clubpoint-history') }}">{{ __('Clubpoint Logs') }}</a></li>

    </ul>
</li>

@if (Module::isEnabled('MenuBuilder') && Route::has('admin.menus.index'))
<li class="{{ Route::is('admin.menus.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.menus.index', getSessionLanguage()) }}">
        <i class="fas fa-th"></i> <span>{{ __('Manage Menu') }}</span>
    </a>
</li>
@endif

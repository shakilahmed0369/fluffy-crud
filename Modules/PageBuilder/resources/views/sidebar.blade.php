@if (Module::isEnabled('MenuBuilder') && Route::has('admin.custom-pages.index'))
<li class="{{ Route::is('admin.custom-pages.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.custom-pages.index') }}">
        <i class="fas fa-th"></i> <span>{{ __('Customize Pages') }}</span>
    </a>
</li>
@endif

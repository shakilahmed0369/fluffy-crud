<li class="{{ Route::is('admin.ourteam.*') ? 'active' : '' }}">
    <a class="nav-link"
        href="{{ route('admin.ourteam.index') }}"><i class="fas fa-home"></i>
        <span>{{ __('Our Team') }}</span>
    </a>
</li>

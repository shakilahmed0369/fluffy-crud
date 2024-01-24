@if (Module::isEnabled('Testimonial') && Route::has('admin.testimonial.index'))
<li class="{{ Route::is('admin.testimonial.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.testimonial.index') }}">
        <i class="fas fa-th"></i> <span>{{ __('admin.Manage Testimonial') }}</span>
    </a>
</li>
@endif

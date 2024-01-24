@if (Module::isEnabled('Faq') && Route::has('admin.faq.index'))
<li class="{{ Route::is('admin.faq.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.faq.index') }}">
        <i class="fas fa-th"></i> <span>{{ __('admin.Manage FAQs') }}</span>
    </a>
</li>
@endif

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">{{ $setting->app_name ?? '' }}</a>
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">{{ $setting->app_name ?? '' }}</a>
        </div>

        <ul class="sidebar-menu">
            @adminCan('dashboard.view')
                <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>
                        <span>{{ __('admin.Dashboard') }}</span>
                    </a>
                </li>
            @endadminCan

            <li
                class="nav-item dropdown {{ Route::is('admin.all-booking') || Route::is('admin.booking-show') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fas fa-shopping-cart"></i><span>{{ __('Dropdown list') }}</span></a>

                <ul class="dropdown-menu">

                    <li class="{{ Route::is('admin.all-booking') || Route::is('admin.booking-show') ? 'active' : '' }}">
                        <a class="nav-link" href="">{{ __('List item') }}</a>
                    </li>
                    <li
                        class="{{ Route::is('admin.all-booking') || Route::is('admin.booking-show') ? 'active' : '' }}">
                        <a class="nav-link" href="">{{ __('List item') }}</a>
                    </li>
                    <li
                        class="{{ Route::is('admin.all-booking') || Route::is('admin.booking-show') ? 'active' : '' }}">
                        <a class="nav-link" href="">{{ __('List item') }}</a>
                    </li>


                </ul>
            </li>

            @if (Module::isEnabled('Order'))
                @include('order::sidebar')
            @endif

            @if (Module::isEnabled('Refund'))
                @include('refund::admin.sidebar')
            @endif

            @if (Module::isEnabled('Wallet'))
                @include('wallet::admin.sidebar')
            @endif

            @if (Module::isEnabled('ClubPoint'))
                @include('clubpoint::admin.sidebar')
            @endif

            @if (Module::isEnabled('PaymentWithdraw'))
                @include('paymentwithdraw::admin.sidebar')
            @endif




            @if (Module::isEnabled('OurTeam'))
                @include('ourteam::sidebar')
            @endif



            @if (Module::isEnabled('Coupon'))
                @include('coupon::sidebar')
            @endif

            @if (Module::isEnabled('Subscription') && checkAdminHasPermission('subscription.view'))
                @include('subscription::admin.sidebar')
            @endif

            @if (Module::isEnabled('Customer') && checkAdminHasPermission('customer.view'))
                @include('customer::sidebar')
            @endif

            @adminCan(['basic.payment.view', 'payment.view'])
                <li
                    class="nav-item dropdown {{ Route::is('admin.basicpayment') || Route::is('admin.paymentgateway') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i
                            class="fas fa-shopping-cart"></i><span>{{ __('Payment Gateway') }}</span></a>

                    <ul class="dropdown-menu">

                        @if (Module::isEnabled('BasicPayment') && checkAdminHasPermission('basic.payment.view'))
                            @include('basicpayment::sidebar')
                        @endif

                        @if (Module::isEnabled('PaymentGateway') && checkAdminHasPermission('payment.view'))
                            @include('paymentgateway::sidebar')
                        @endif

                    </ul>
                </li>
            @endadminCan

            @if (Module::isEnabled('MenuBuilder') && checkAdminHasPermission('menu.view'))
                @include('menubuilder::sidebar')
            @endif

            @if (Module::isEnabled('Language') && checkAdminHasPermission('language.view'))
                @include('language::sidebar')
            @endif

            @if (Module::isEnabled('Blog') && checkAdminHasPermission('blog.view'))
                @include('blog::sidebar')
            @endif

            @if (Module::isEnabled('GlobalSetting') && checkAdminHasPermission('setting.view'))
                @include('globalsetting::sidebar')
            @endif

            @if (Module::isEnabled('SupportTicket') && checkAdminHasPermission('support.ticket.view'))
                @include('supportticket::sidebar')
            @endif

            @if (Module::isEnabled('PageBuilder') && checkAdminHasPermission('page.view'))
                @include('pagebuilder::sidebar')
            @endif

            @if (Module::isEnabled('NewsLetter') && checkAdminHasPermission('newsletter.view'))
                @include('newsletter::sidebar')
            @endif

            @if (Module::isEnabled('ContactMessage') && checkAdminHasPermission('contect.message.view'))
                @include('contactmessage::sidebar')
            @endif

            @if (Module::isEnabled('Testimonial') && checkAdminHasPermission('testimonial.view'))
                @include('testimonial::sidebar')
            @endif
            @if (Module::isEnabled('Faq') && checkAdminHasPermission('faq.view'))
            @include('faq::sidebar')
            @endif

            @adminCan(['role.view', 'admin.view'])
                <li
                    class="nav-item dropdown {{ Route::is('admin.admin.*') || Route::is('admin.role.*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i
                            class="fas fa-shopping-cart"></i><span>{{ __('Admin & Roles') }}</span></a>
                    <ul class="dropdown-menu">
                        @adminCan(['admin.view'])
                            <li class="{{ Route::is('admin.admin.*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.admin.index') }}">{{ __('Manage Admin') }}</a>
                            </li>
                        @endadminCan
                        @adminCan(['role.view'])
                            <li class="{{ Route::is('admin.role.*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.role.index') }}">{{ __('Role & Permissions') }}</a>
                            </li>
                        @endadminCan
                    </ul>
                </li>
            @endadminCan
        </ul>

    </aside>
</div>

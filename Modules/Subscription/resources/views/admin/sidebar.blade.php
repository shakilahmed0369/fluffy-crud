<li class="nav-item dropdown {{ Route::is('admin.subscription-plan.*') || Route::is('admin.plan-transaction-history') || Route::is('admin.assign-plan') || Route::is('admin.purchase-history-show') || Route::is('admin.pending-plan-transaction') || Route::is('admin.subscription-history') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i> <span>{{ __('Subscription') }}
        <small class="badge badge-danger">{{ __('Add') }}</small>
    </span>

    </a>
    <ul class="dropdown-menu">
        <li class="{{  Route::is('admin.subscription-plan.*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.subscription-plan.index') }}">{{ __('Subscription Plan') }}</a></li>


        <li class="{{ Route::is('admin.subscription-history') || Route::is('admin.purchase-history-show') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.subscription-history') }}">{{ __('Subscription History') }}</a></li>

        <li class="{{ Route::is('admin.plan-transaction-history') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.plan-transaction-history') }}">{{ __('Transaction History') }}</a></li>

        <li class="{{ Route::is('admin.pending-plan-transaction') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.pending-plan-transaction') }}">{{ __('Pending Transaction') }}</a></li>

        <li {{ Route::is('admin.assign-plan') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.assign-plan') }}">{{ __('Assign Plan') }}</a></li>

    </ul>
</li>

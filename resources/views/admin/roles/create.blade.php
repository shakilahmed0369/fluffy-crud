@extends('admin.master_layout')
@section('title')
    <title>{{ __('Create Role') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Create Role') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.role.index') }}">{{ __('Manage Roles') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Create Role') }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Create Role') }}</h4>
                                <div>
                                    @adminCan('role.view')
                                        <a href="{{ route('admin.role.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                    @endadminCan
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form role="form" action="{{ route('admin.role.store') }}" method="POST">
                                            @csrf
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="name">{{ __('Name') }}</label>
                                                    <input name="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="role_name" placeholder="{{ __('Enter name') }}">
                                                    @error('name')
                                                        <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="permission">{{ __('Permission') }}</label>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="permission_all" value="1">
                                                        <label for="permission_all"
                                                            class="custom-control-label">{{ __('All') }}</label>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                    @php $i=1; @endphp
                                                    @foreach ($permission_groups as $group)
                                                        <div class="mb-2 col-md-6 row bottom-border">
                                                            <div class="col-3">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input class="custom-control-input" type="checkbox"
                                                                        id="{{ $i }}management"
                                                                        onclick="CheckPermissionByGroup('role-{{ $i }}-management-checkbox',this)"
                                                                        value="2">
                                                                    <label for="{{ $i }}management"
                                                                        class="custom-control-label text-capitalize">{{ $group->name }}</label>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-9 role-{{ $i }}-management-checkbox">
                                                                @php
                                                                    $permissionss = App\Models\Admin::getpermissionsByGroupName($group->name);
                                                                    $j = 1;
                                                                @endphp
                                                                @foreach ($permissionss as $permission)
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input name="permissions[]"
                                                                            class="custom-control-input" type="checkbox"
                                                                            id="permission_checkbox_{{ $permission->id }}"
                                                                            value="{{ $permission->name }}">
                                                                        <label
                                                                            for="permission_checkbox_{{ $permission->id }}"
                                                                            class="custom-control-label">{{ $permission->name }}</label>
                                                                    </div>
                                                                    @php $j++; @endphp
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        @php $i++; @endphp
                                                    @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="text-center col-md-8 offset-md-2">
                                                    <x-admin.save-button :text="__('admin.Save')"></x-admin.save-button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script>
        "use strict"
        $('#permission_all').on('click', function() {
            if ($(this).is(':checked')) {
                $('input[type=checkbox]').prop('checked', true);
            } else {
                $('input[type=checkbox]').prop('checked', false);
            }
        });

        "use strict"

        function CheckPermissionByGroup(classname, checkthis) {
            const groupIdName = $("#" + checkthis.id);
            const classCheckBox = $('.' + classname + ' input');
            if (groupIdName.is(':checked')) {
                classCheckBox.prop('checked', true);
            } else {
                classCheckBox.prop('checked', false);
            }
        }
    </script>
@endpush
@push('css')
<style>
    .bottom-border {
        border-bottom: 1px solid rgb(56, 53, 53);
    }
</style>
@endpush

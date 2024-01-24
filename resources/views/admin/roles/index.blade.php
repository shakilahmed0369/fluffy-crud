@extends('admin.master_layout')
@section('title')
    <title>{{ __('Manage Roles') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Manage Roles') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Role List') }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Manage Roles') }}</h4>
                                <div>
                                    @adminCan('role.create')
                                        <a href="{{ route('admin.role.create') }}" class="btn btn-primary"><i
                                                class="fa fa-plus"></i> {{ __('Add New') }}</a>
                                    @endadminCan
                                    @adminCan('role.assign')
                                        <a href="{{ route('admin.role.assign') }}" class="btn btn-success"><i
                                                class="fa fa-sync"></i> {{ __('Assign Role') }}</a>
                                    @endadminCan
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive max-h-400">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="20%">{{ __('Name') }}</th>
                                                <th>{{ __('Permission') }}</th>
                                                @adminCan(['role.edit', 'role.delete'])
                                                    <th width="10%">{{ __('Action') }}</th>
                                                @endadminCan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($roles as $role)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ ucwords($role->name) }}</td>
                                                    <td>
                                                        <a href="#" id="ShowPer{{ $loop->index + 1 }}"
                                                            onclick="ShowPermission('ShowPer{{ $loop->index + 1 }}', 'allPermission{{ $loop->index + 1 }}' )">
                                                            <svg width="22px" height="22px" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                                </path>
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                        <span class="row d-none" id="allPermission{{ $loop->index + 1 }}">
                                                            <a href="#" id="ShowPer{{ $loop->index + 1 }}"
                                                                onclick="HidePermission('allPermission{{ $loop->index + 1 }}' , 'ShowPer{{ $loop->index + 1 }}' )"
                                                                class="col-md-1">
                                                                <svg width="22px" height="22px" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                                                    </path>
                                                                </svg>
                                                            </a>
                                                            <span class="col-md-11">
                                                                @foreach ($role->permissions as $item)
                                                                    <span
                                                                        class="p-1 badge badge-primary permission">{{ $item->name }}</span>
                                                                @endforeach
                                                            </span>
                                                        </span>
                                                    </td>
                                                    @adminCan(['role.edit', 'role.delete'])
                                                        <td>
                                                            @adminCan('role.edit')
                                                                <a href="{{ route('admin.role.edit', $role->id) }}"
                                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"
                                                                        aria-hidden="true"></i></a>
                                                            @endadminCan
                                                            @adminCan('role.delete')
                                                                <a href="javascript:;" data-toggle="modal"
                                                                    data-target="#deleteModal" class="btn btn-danger btn-sm"
                                                                    onclick="deleteData({{ $role->id }})"><i
                                                                        class="fa fa-trash" aria-hidden="true"></i></a>
                                                            @endadminCan
                                                        </td>
                                                    @endadminCan
                                                </tr>
                                            @empty
                                                <x-admin.update-button :text="__('admin.Update')"></x-admin.update-button>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="float-right">
                                        {{ $roles->links() }}
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

        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ url('/admin/role/') }}' + "/" + id)
        }
        "use strict";

        function ShowPermission(id1, id2) {
            $('#' + id1).addClass('d-none');
            $('#' + id2).removeClass('d-none');
        };

        "use strict";

        function HidePermission(id1, id2) {
            $('#' + id1).addClass('d-none');
            $('#' + id2).removeClass('d-none');
        }
    </script>
@endpush

@push('css')
    <style>
        .dd-custom-css {
            position: absolute;
            will-change: transform;
            top: 0px;
            left: 0px;
            transform: translate3d(0px, -131px, 0px);
        }

        .max-h-400 {
            min-height: 400px;
        }
    </style>
@endpush

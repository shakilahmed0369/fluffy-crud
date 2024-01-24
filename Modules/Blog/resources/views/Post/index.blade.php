@extends('admin.master_layout')
@section('title')
    <title>{{ __('Post List') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Post List') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Post List') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Post List') }}</h4>
                                <div>
                                    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary"><i
                                            class="fa fa-plus"></i>{{ __('Add New') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive max-h-400">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">{{ __('admin.SN') }}</th>
                                                <th width="30%">{{ __('admin.Title') }}</th>
                                                <th width="15%">{{ __('admin.Category') }}</th>
                                                <th width="10%">{{ __('admin.Show Homepage') }}</th>
                                                <th width="10%">{{ __('admin.Popular') }}</th>
                                                <th width="15%">{{ __('admin.Status') }}</th>
                                                <th width="15%">{{ __('admin.Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($posts as $blog)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td><a target="_blank" href="">{{ $blog->title }}</a>
                                                    </td>
                                                    <td>{{ $blog?->category?->title }}</td>

                                                    <td>
                                                        @if ($blog->show_homepage == 1)
                                                            <span class="badge badge-success">{{ __('admin.Yes') }}</span>
                                                        @else
                                                            <span class="badge badge-danger">{{ __('admin.No') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($blog->is_popular == 1)
                                                            <span class="badge badge-success">{{ __('admin.Yes') }}</span>
                                                        @else
                                                            <span class="badge badge-danger">{{ __('admin.No') }}</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <input onchange="changeStatus({{ $blog->id }})"
                                                            id="status_toggle" type="checkbox"
                                                            {{ $blog->status ? 'checked' : '' }}
                                                            data-toggle="toggle" data-on="{{ __('admin.Active') }}"
                                                            data-off="{{ __('admin.Inactive') }}" data-onstyle="success"
                                                            data-offstyle="danger">
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.blogs.edit', ['blog' => $blog->id, 'code' => getSessionLanguage()]) }}"
                                                            class="btn btn-warning btn-sm"><i class="fa fa-edit"
                                                                aria-hidden="true"></i></a>
                                                        <a href="javascript:;" data-toggle="modal"
                                                            data-target="#deleteModal" class="btn btn-danger btn-sm"
                                                            onclick="deleteData({{ $blog->id }})"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('admin.Post')" route="admin.blogs.create" create="yes"
                                                    :message="__('admin.No data found!')" colspan="7"></x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $posts->links() }}
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
            $("#deleteForm").attr("action", '{{ url("/admin/blogs/") }}' + "/" + id)
        }
        "use strict"
        function changeStatus(id) {
            var isDemo = "{{ env('PROJECT_MODE') ?? 1 }}"
            if (isDemo == 0) {
                toastr.error("{{ __('This Is Demo Version. You Can Not Change Anything') }}");
                return;
            }
            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                url: "{{ url('/admin/blogs/status-update') }}" + "/" + id,
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                    } else {
                        toastr.warning(response.message);
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
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

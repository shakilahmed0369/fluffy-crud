@extends('admin.master_layout')
@section('title')
    <title>{{ __('Post Comments') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Post Comments') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Post Comments') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Post Comments') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive max-h-400">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">{{ __('admin.SN') }}</th>
                                                <th width="30%">{{ __('admin.Comment') }}</th>
                                                <th width="15%">{{ __('admin.Post') }}</th>
                                                <th width="10%">{{ __('admin.Author') }}</th>
                                                <th width="10%">{{ __('admin.Email') }}</th>
                                                <th width="15%">{{ __('admin.Status') }}</th>
                                                <th width="15%">{{ __('admin.Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($comments as $comment)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>
                                                        {{ $comment->comment }}
                                                    </td>
                                                    <td>{{ $comment?->post?->title }}</td>

                                                    <td>
                                                        {{ $comment->name }}
                                                    </td>
                                                    <td>
                                                        {{ $comment->email }}
                                                    </td>

                                                    <td>
                                                        <input onchange="changeStatus({{ $comment->id }})"
                                                            id="status_toggle" type="checkbox"
                                                            {{ $comment->status ? 'checked' : '' }}
                                                            data-toggle="toggle" data-on="{{ __('admin.Active') }}"
                                                            data-off="{{ __('admin.Inactive') }}" data-onstyle="success"
                                                            data-offstyle="danger">
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.blog-comment.show', $comment?->post?->id) }}"
                                                            class="btn btn-success btn-sm"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></a>
                                                        <a href="javascript:;" data-toggle="modal"
                                                            data-target="#deleteModal" class="btn btn-danger btn-sm"
                                                            onclick="deleteData({{ $comment->id }})"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('admin.Post Comments')" route="admin.blog-comment.index"
                                                    create="no" :message="__('admin.No data found!')" colspan="7"></x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $comments->links() }}
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
        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ url("/admin/blog-comment/") }}' + "/" + id)
        }

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
                url: "{{ url('/admin/blog-comment/status-update') }}" + "/" + id,
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

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
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.blog-comment.index') }}">{{ __('Post Comments') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('All Comments') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Post Comments') }}</h4>
                                <div>
                                    <a href="{{ route('admin.blog-comment.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>{{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                        @foreach ($comments as $comment)
                                            <li class="media">
                                                <img alt="image" class="mr-3 rounded-circle" width="70" src="{{ asset('uploads\website-images\avatar-2023-11-05-08-21-19-9394.jpg') }}">
                                                <div class="media-body">
                                                    <div class="media-right">
                                                        @if ($comment->status == 1)
                                                            <div class="text-primary">{{ __('Approved') }}</div>
                                                        @else
                                                            <div class="text-warning">{{ __('Pending') }}</div>
                                                        @endif
                                                    </div>
                                                    <div class="mb-1 media-title">{{ $comment->name }}</div>
                                                    <div class="text-time">{{ $comment?->created_at?->diffForHumans() }}
                                                    </div>
                                                    <div class="media-description text-muted">
                                                        {!! $comment->comment !!}
                                                    </div>
                                                    <div class="media-links">
                                                        <a href="{{ route('admin.blogs.show', $comment->blog_id) }}">{{ __('View') }}</a>
                                                        <div class="bullet"></div>
                                                        <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" onclick="deleteData({{ $comment->id }})" class="text-danger">{{ __('Trash') }}</a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
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
    </script>
@endpush

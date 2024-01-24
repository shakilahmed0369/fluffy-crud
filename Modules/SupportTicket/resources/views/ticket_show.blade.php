@extends('admin.master_layout')
@section('title')
    <title>{{ __('Support Ticket') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Support Tickets') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.support.ticket') }}">{{ __('Support Ticket') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Support Ticket') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Messages') }}</h4>
                            </div>
                            <div class="card-body ticket-message">
                                <div class="list-group">
                                    @foreach ($messages as $message)
                                        @if ($message->admin_id == 0)
                                            <div
                                                class="mb-2 list-group-item list-group-item-action flex-column align-items-start author_message">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h6 class="mb-1"> {{ $ticket?->user?->name ?? '' }}
                                                        <small>({{ __('Author') }})</small>
                                                    </h6>
                                                    <small>{{ $message->created_at->diffForHumans() }}</small>
                                                </div>
                                                <p class="mb-1">{!! html_decode(clean(nl2br($message->message))) !!}</p>

                                                @if ($message?->documents)
                                                    <div class="gallery">
                                                        @foreach ($message?->documents as $document)
                                                            <a href="" class="upload_photo"><i
                                                                    class="fas fa-link"></i>
                                                                {{ $document->file_name }}</a>
                                                        @endforeach
                                                    </div>
                                                @endif

                                            </div>
                                        @else
                                            <div
                                                class="mb-2 list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h6 class="mb-1">{{ $message?->admin?->name ?? '' }}
                                                        <small>({{ __('Administrator') }})</small>
                                                    </h6> <small>{{ $message->created_at->diffForHumans() }} </small>
                                                </div>
                                                <p class="mb-1">{!! html_decode(clean(nl2br($message->message))) !!}</p>

                                                @if ($message?->documents)
                                                    <div class="gallery">
                                                        @foreach ($message->documents as $document)
                                                            <a href="" class="upload_photo"><i
                                                                    class="fas fa-link"></i>
                                                                {{ $document->file_name }}</a>
                                                        @endforeach
                                                    </div>
                                                @endif

                                            </div>
                                        @endif
                                    @endforeach


                                </div>

                                @if ($ticket->status != 'closed')
                                    <div class="mt-4 message-box">
                                        <form @adminCan('support.ticket.manage')
                                                action="{{ route('admin.support.store-ticket-message') }}"
                                            @endadminCan method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <textarea required name="message" placeholder="{{ __('Type here') }}.." class="form-control text-area-5" id=""
                                                    cols="30" rows="10"></textarea>
                                            </div>
                                            <input type="hidden" value="{{ $ticket->id }}" name="ticket_id">
                                            <input type="hidden" value="{{ $ticket?->user?->id }}" name="user_id">
                                            <div class="form-group">
                                                <input type="file" name="documents[]" multiple
                                                    class="form-control multi">
                                                <span class="text-danger">{{ __('Maximum file size 2MB') }}</span>
                                            </div>
                                            @adminCan('support.ticket.manage')
                                                <button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
                                            @endadminCan
                                        </form>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h6>{{ __('admin.Ticket Information') }}</h6>
                                <hr>
                                <p>{{ __('admin.Subject') }}: {{ html_decode($ticket->subject) }}</p>
                                <p>{{ __('admin.Ticket Id') }}: {{ $ticket->ticket_id }}</p>

                                <p>{{ __('admin.Created') }}: {{ $ticket->created_at->format('h:m A, d-M-Y') }}</p>
                                <p>{{ __('admin.Status') }}:
                                    @if ($ticket->status == 'pending')
                                        <span class="badge badge-danger">{{ __('admin.Pending') }}</span>
                                    @elseif ($ticket->status == 'in_progress')
                                        <span class="badge badge-success">{{ __('admin.In Progress') }}</span>
                                    @elseif ($ticket->status == 'closed')
                                        <span class="badge badge-danger">{{ __('admin.Closed') }}</span>
                                    @endif
                                </p>

                                <h6 class="mt-3">{{ __('admin.User Information') }}</h6>
                                <hr>

                                @if ($ticket->ticket_from == 'Client')
                                    <p>
                                        {{ __('admin.Name') }}: {{ $ticket?->user?->name ?? '' }}
                                    </p>
                                    <p>{{ __('admin.User Type') }} : {{ __('admin.Client') }}</p>
                                    <p>{{ __('admin.Email') }} : {{ $ticket?->user?->email ?? '' }}</p>
                                    <p>{{ __('admin.Phone') }} : {{ $ticket?->user?->Phone ?? '' }}</p>
                                @else
                                    <p>
                                        {{ __('admin.Name') }}: {{ $ticket?->user?->name ?? '' }}</a>
                                    </p>
                                    <p>{{ __('admin.User Type') }} : {{ __('admin.Influencer') }}</p>
                                    <p>{{ __('admin.Email') }} : {{ $ticket?->user?->email ?? '' }}</p>
                                    <p>{{ __('admin.Phone') }} : {{ $ticket?->user?->Phone ?? '' }}</p>
                                @endif
                                @adminCan('support.ticket.delete')
                                    <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger"
                                        onclick="deleteData({{ $ticket->id }})"><i class="fa fa-trash"
                                            aria-hidden="true"></i>
                                        {{ __('admin.Delete') }}</a>
                                @endadminCan
                                @adminCan('support.ticket.close')
                                    @if ($ticket->status != 'closed')
                                        <a data-toggle="modal" data-target="#closeTicket" href="javascript:;"
                                            class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i>
                                            {{ __('admin.Closed') }}</a>
                                    @endif
                                @endadminCan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @adminCan('support.ticket.delete')
        <div class="modal fade" tabindex="-1" role="dialog" id="closeTicket">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('admin.Ticket Closed Confirmation') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('admin.Are You sure closed this ticket ?') }}</p>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <form action="{{ route('admin.support.ticket-closed', $ticket->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary">{{ __('admin.Yes, Closed') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endadminCan
@endsection

@push('js')
    <script src="{{ asset('/backend/js/jquery.MultiFile.min.js') }}" type="text/javascript" language="javascript"></script>
    <script>
        "use strict"

        function deleteData(id) {
            $("#deleteForm").attr("action", "{{ url('admin/support/ticket-delete') }}" + "/" + id)
        }
    </script>
@endpush

@push('css')
@endpush

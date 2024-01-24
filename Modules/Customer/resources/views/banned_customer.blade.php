@extends('admin.master_layout')
@section('title')
<title>{{ __('Banned Customers') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Banned Customers') }}</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table table-striped" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SN') }}</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Joined at') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $index => $user)
                                                <tr>
                                                    <td>{{ ++$index }}</td>
                                                    <td>{{ html_decode($user->name) }}</td>
                                                    <td>{{ html_decode($user->email) }}</td>
                                                    <td>{{ $user->created_at->format('h:iA, d M Y') }}</td>
                                                    <td>
                                                        <a  href="{{ route('admin.customer-show',$user->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>

                                                        <a  onclick="deleteData({{ $user->id }})" href="javascript:;" data-toggle="modal" data-target="#deleteModal"  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    @push('js')
        <script>
            function deleteData(id) {
                $("#deleteForm").attr("action", '{{ url("/admin/customer-delete/") }}' + "/" + id)
            }
        </script>
    @endpush
@endsection

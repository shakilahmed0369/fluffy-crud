@extends('admin.master_layout')
@section('title')
<title>{{ __('Our Team') }}</title>
@endsection
@section('admin-content')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Our Team') }}</h1>
            </div>

            <div class="section-body">
                <a href="{{ route('admin.ourteam.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('Add New') }}</a>
                <div class="row mt-4">
                    <div class="col">
                    <div class="card">
                        <div class="card-body">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>{{ __('SN') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Designation') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teams as $index => $team)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $team->name }}</td>
                                            <td>{{ $team->designation }}</td>
                                            <td>
                                                @if($team->status == 'active')
                                                    <span class="badge badge-success">{{ __('Active') }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ __('In-active') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.ourteam.edit',$team->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $team->id }})"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
        </section>
    </div>

    <script>
        "use strict";
        function deleteData(id){
            $("#deleteForm").attr("action",'{{ url("admin/ourteam/") }}'+"/"+id)
        }
    </script>
@endsection

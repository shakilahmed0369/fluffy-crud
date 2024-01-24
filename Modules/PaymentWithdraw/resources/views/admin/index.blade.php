@extends('admin.master_layout')
@section('title')
<title>{{ $title }}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{ $title }}</h1>

          </div>

          <div class="section-body">
            <div class="row mt-4">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive table-invoice">
                        <table class="table table-striped" id="dataTable">
                            <thead>
                                <tr>
                                    <th >{{ __('SN') }}</th>
                                    <th >{{ __('User') }}</th>
                                    <th >{{ __('Method') }}</th>
                                    <th >{{ __('Charge') }}</th>
                                    <th >{{ __('Total Amount') }}</th>
                                    <th >{{ __('Withdraw Amount') }}</th>
                                    <th >{{ __('Status') }}</th>
                                    <th >{{ __('Action') }}</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @foreach ($withdraws as $index => $withdraw)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td><a href="{{ route('admin.customer-show', $withdraw->user_id) }}">{{ $withdraw?->user?->name }}</a></td>

                                        <td>{{ $withdraw->method }}</td>
                                        <td>
                                            {{ currency($withdraw->total_amount - $withdraw->withdraw_amount) }}
                                        </td>
                                        <td>
                                            {{ currency($withdraw->total_amount) }}
                                        </td>
                                        <td>
                                            {{ currency($withdraw->withdraw_amount) }}
                                        </td>
                                        <td>
                                            @if ($withdraw->status== 'approved')
                                                <span class="badge badge-success">{{ __('Success') }}</span>
                                            @elseif ($withdraw->status== 'rejected')
                                                <span class="badge badge-danger">{{ __('Rejected') }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ __('Pending') }}</span>
                                            @endif
                                        </td>
                                        <td>

                                            <a href="{{ route('admin.show-withdraw',$withdraw->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                            <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $withdraw->id }})"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
         "use strict"
        function deleteData(id){
            $("#deleteForm").attr("action",'{{ url("admin/delete-influencer-withdraw/") }}'+"/"+id)
        }
    </script>
@endsection

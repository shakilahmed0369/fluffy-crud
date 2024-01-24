@extends('admin.master_layout')
@section('title')
<title>{{ __('Withdraw Method') }}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{ __('Withdraw Method') }}</h1>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.withdraw-method.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('Add New') }}</a>
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
                                    <th>{{ __('Minimum Amount') }}</th>
                                    <th>{{ __('Maximum Amount') }}</th>
                                    <th>{{ __('Charge') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @foreach ($methods as $index => $method)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $method->name }}</td>
                                        <td>
                                            {{ currency($method->min_amount) }}

                                        </td>
                                        <td>
                                            {{ currency($method->max_amount) }}

                                        </td>
                                        <td>{{ $method->withdraw_charge }}%</td>
                                        <td>
                                            @if($method->status == 'active')
                                                <span class="badge badge-success">{{ __('Active') }}</span>
                                            @else
                                                <span class="badge badge-danger">{{__('In active') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                        <a href="{{ route('admin.withdraw-method.edit',$method->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $method->id }})"><i class="fa fa-trash" aria-hidden="true"></i></a>

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
        $("#deleteForm").attr("action",'{{ url("admin/withdraw-method/") }}'+"/"+id)
    }

</script>
@endsection

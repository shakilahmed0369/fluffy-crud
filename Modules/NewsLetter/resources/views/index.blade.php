@extends('admin.master_layout')
@section('title')
<title>{{ __('Subscriber List') }}</title>
@endsection
@section('admin-content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Subscriber List') }}</h1>
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
                                            <th>{{ __('admin.SN') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Subscribed at') }}</th>
                                            <th>{{ __('admin.Action') }}</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($newsletters as $index => $item)
                                            <tr>
                                                <td>{{ ++$index }}</td>
                                                <td>{{ html_decode($item->email) }}</td>
                                                <td>{{ $item->created_at->format('h:iA, d M Y') }}</td>
                                                <td>
                                                    <a onclick="deleteData({{ $item->id }})" href="javascript:;" data-toggle="modal"
                                                        data-target="#deleteModal" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
          $("#deleteForm").attr("action", '{{ url("/admin/subscriber-delete/") }}' + "/" + id)
      }
  </script>
@endpush
@endsection

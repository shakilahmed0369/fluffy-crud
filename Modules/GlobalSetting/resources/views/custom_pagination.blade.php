@extends('admin.master_layout')
@section('title')
<title>{{ __('admin.Custom Pagination') }}</title>
@endsection
@section('admin-content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Custom Pagination') }}</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-custom-pagination') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="50%">{{ __('admin.Section Name') }}</th>
                                            <th width="50%">{{ __('admin.Quantity') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($custom_paginations as $custom_pagination)
                                            <tr>
                                                <td>{{ $custom_pagination->section_name }}</td>
                                                <td>
                                                    <input type="number" value="{{ $custom_pagination->item_qty }}" name="quantities[]" class="form-control">
                                                    <input type="hidden" value="{{ $custom_pagination->id }}" name="ids[]">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                <button class="btn btn-primary">{{ __('admin.Update') }}</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
  </div>

@endsection

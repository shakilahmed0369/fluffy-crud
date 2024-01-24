@extends('admin.master_layout')
@section('title')
<title>{{ __('admin.Google Analytic') }}</title>
@endsection
@section('admin-content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Google Analytic') }}</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-google-analytic') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">{{ __('Status') }}</label>
                                    <select name="google_analytic_status" id="tawk_allow" class="form-control">
                                        <option {{ $setting->google_analytic_status == 'active' ? 'selected' : '' }} value="active">{{ __('admin.Enable') }}</option>
                                        <option {{ $setting->google_analytic_status == 'inactive' ? 'selected' : '' }} value="inactive">{{ __('admin.Disable') }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('admin.Analytic Tracking Id') }}</label>
                                    @if (env('APP_MODE') == 'DEMO')
                                        <input type="text" class="form-control" name="google_analytic_id" value="ANA-34343434-TEST-ID">
                                    @else
                                        <input type="text" class="form-control" name="google_analytic_id" value="{{ $setting->google_analytic_id }}">
                                    @endif
                                </div>

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

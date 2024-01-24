@extends('admin.master_layout')
@section('title')
<title>{{ __('admin.Tawk Chat') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('admin.Tawk Chat') }}</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.update-tawk-chat') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="">{{ __('Status') }}</label>
                                        <select name="tawk_status" id="tawk_status" class="form-control">
                                            <option {{ $setting->tawk_status == 'active' ? 'selected' : '' }} value="active">{{ __('admin.Enable') }}</option>
                                            <option {{ $setting->tawk_status == 'inactive' ? 'selected' : '' }} value="inactive">{{ __('admin.Disable') }}</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Tawk Chat Link') }}</label>
                                        @if (env('APP_MODE') == 'DEMO')
                                            <input type="text" class="form-control" name="tawk_chat_link" value="https://www.tawk.to/demo-link/34893439">
                                        @else
                                            <input type="text" class="form-control" name="tawk_chat_link" value="{{ $setting->tawk_chat_link }}">
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

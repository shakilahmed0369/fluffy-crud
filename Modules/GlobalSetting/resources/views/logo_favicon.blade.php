@extends('admin.master_layout')
@section('title')
<title>{{ __('admin.Logo & Favicon') }}</title>
@endsection
@section('admin-content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Logo & Favicon') }}</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-logo-favicon') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="">{{ __('admin.Existing Logo') }}</label>
                                    <div>
                                        <img src="{{ asset($setting->logo) }}" alt="" width="200px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('admin.New Logo') }}</label>
                                    <input type="file" name="logo" class="form-control-file">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('admin.Existing Favicon') }}</label>
                                    <div>
                                        <img src="{{ asset($setting->favicon) }}" alt="" width="50px">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('admin.New Favicon') }}</label>
                                    <input type="file" name="favicon" class="form-control-file">
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

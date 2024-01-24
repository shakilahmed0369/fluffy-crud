@extends('admin.master_layout')
@section('title')
<title>{{ __('admin.Default avatar') }}</title>
@endsection
@section('admin-content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Default avatar') }}</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-default-avatar') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="">{{ __('admin.Existing avatar') }}</label>
                                    <div>
                                        <img class="w_120" src="{{ asset($setting->default_avatar) }}" alt="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('admin.New avatar') }}</label>
                                    <input type="file" name="default_avatar" class="form-control-file" >
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

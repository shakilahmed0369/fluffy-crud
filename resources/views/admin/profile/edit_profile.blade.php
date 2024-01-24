@extends('admin.master_layout')
@section('title')
<title>{{ __('Edit Profile') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Edit Profile') }}</h1>
            </div>

            {{-- edit profile area  --}}
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt="image" src="{{ $admin->image ? asset($admin->image) : '' }}" class="rounded-circle profile-widget-picture">
                            </div>

                            <div class="profile-widget-description">

                                <form @adminCan('admin.profile.edit') action="{{ route('admin.profile-update') }}" @endadminCan enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>{{ __('admin.New Image') }}</label>
                                            <input type="file" class="form-control-file" name="image">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Name') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{ $admin->name }}" name="name">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Email') }} <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" value="{{ $admin->email }}" name="email">
                                        </div>
                                    </div>
                                    @adminCan('admin.profile.edit')
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary">{{ __('admin.Update') }}</button>
                                        </div>
                                    </div>
                                    @endadminCan
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{-- edit profile area  --}}

            {{-- edit password area --}}

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card ">
                            <div class="card-body">
                                <form @adminCan('admin.profile.edit') action="{{ route('admin.update-password') }}" @endadminCan enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Current Password') }} <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="current_password">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Password') }} <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Confirm Password') }} <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>

                                    </div>
                                    @adminCan('admin.profile.edit')
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary">{{ __('admin.Update') }}</button>
                                        </div>
                                    </div>
                                    @endadminCan
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- edit password area --}}

        </section>
    </div>
@endsection

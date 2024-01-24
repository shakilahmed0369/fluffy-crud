@extends('admin.master_layout')
@section('title')
<title>{{ __('Our Team') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Edit Team') }}</h1>
            </div>

            <div class="section-body">
                <a href="{{ route('admin.ourteam.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{ __('Our Team') }}</a>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.ourteam.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>{{ __('Existing Image') }}</label>
                                        <div>
                                            <img src="{{ asset($team->image) }}" alt="" width="150px">
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{ __('Image') }} <span class="text-danger">*</span></label>
                                        <input type="file" id="title" class="form-control-file"  name="image">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control"  name="name" value="{{ $team->name }}">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{ __('Desgination') }} <span class="text-danger">*</span></label>
                                        <input type="text" id="designation" class="form-control"  name="designation" value="{{ $team->designation }}">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{ __('Facebook') }} </label>
                                        <input type="text" class="form-control"  name="facebook" value="{{ $team->facebook }}">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{ __('Twitter') }} </label>
                                        <input type="text" class="form-control"  name="twitter" value="{{ $team->twitter }}">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{ __('Linkedin') }} </label>
                                        <input type="text" class="form-control"  name="linkedin" value="{{ $team->linkedin }}">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{ __('Instagram') }} </label>
                                        <input type="text" class="form-control"  name="instagram" value="{{ $team->instagram }}">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{ __('Status') }} <span class="text-danger">*</span></label>
                                        <select name="status" class="form-control">
                                            <option  {{ $team->status == 'active' ? 'selected' : '' }} value="active">{{ __('Active') }}</option>
                                            <option  {{ $team->status == 'inactive' ? 'selected' : '' }} value="inactive">{{ __('Inactive') }}</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

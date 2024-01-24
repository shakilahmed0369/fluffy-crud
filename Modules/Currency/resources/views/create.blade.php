@extends('admin.master_layout')
@section('title')
<title>{{ __('Create currency') }}</title>
@endsection
@section('admin-content')
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{ __('Create Currency') }}</h1>
          </div>
            <div class="section-body">
                <a href="{{ route('admin.currency.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{ __('Currency List') }}</a>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.currency.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>{{ __('Currency Name') }} <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="currency_name" value="{{ old('currency_name') }}">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Country Code') }} <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="country_code" value="{{ old('country_code') }}">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Currency Code') }} <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="currency_code" value="{{ old('currency_code') }}">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Currency Icon') }} <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="currency_icon" value="{{ old('currency_icon') }}">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('Currency Rate') }} <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="currency_rate" value="{{ old('currency_rate') }}">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('Default') }} <span class="text-danger">*</span></label>
                                            <select name="is_default" class="form-control">
                                                <option value="no">{{ __('No') }}</option>
                                                <option value="yes">{{ __('Yes') }}</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('Currency Position') }} <span class="text-danger">*</span></label>
                                            <select name="currency_position" class="form-control">
                                                <option value="before_price">{{ __('Before Price') }}</option>
                                                <option value="before_price_with_space">{{ __('Before Price With Space') }}</option>
                                                <option value="after_price">{{ __('After Price') }}</option>
                                                <option value="after_price_with_space">{{ __('After Price With Space') }}</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('admin.Status') }} <span class="text-danger">*</span></label>
                                            <select name="status" class="form-control">
                                                <option value="active">{{ __('admin.Active') }}</option>
                                                <option value="inactive">{{ __('admin.Inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary">{{ __('admin.Save') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      </div>
@endsection

@extends('admin.master_layout')
@section('title')
<title>{{ __('Basic Payment') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Basic Payment') }}</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1>{{ __('Stripe Payment') }}</h1>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('admin.update-stripe') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ __('Currency Name') }}</label>
                                                <select name="stripe_currency_id" id="" class="form-control">
                                                    <option value="">{{ __('Select Currency') }}</option>
                                                    @foreach ($currencies as $currency)
                                                        <option {{ $basic_payment->stripe_currency_id == $currency->id ? 'selected' : '' }} value="{{ $currency->id }}">{{ $currency->currency_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ __('Gateway charge (%)') }}</label>
                                                <input type="text" class="form-control" name="stripe_charge" value="{{ $basic_payment->stripe_charge }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Stripe Key') }}</label>
                                        @if (env('APP_MODE') == 'DEMO')
                                            <input type="text" class="form-control" name="stripe_key" value="DEMO-STRIPE-83493483-TEST-KEY">
                                        @else
                                            <input type="text" class="form-control" name="stripe_key" value="{{ $basic_payment->stripe_key }}">
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Stripe Secret') }}</label>
                                        @if (env('APP_MODE') == 'DEMO')
                                            <input type="text" class="form-control" name="stripe_secret" value="STRIPE-TEST98384934-SECRET-KEY">
                                        @else
                                            <input type="text" class="form-control" name="stripe_secret" value="{{ $basic_payment->stripe_secret }}">
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('Status') }}</label>
                                        <select name="stripe_status" id="stripe_status" class="form-control">
                                            <option {{ $basic_payment->stripe_status == 'active' ? 'selected' : '' }} value="active">{{ __('admin.Enable') }}</option>
                                            <option {{ $basic_payment->stripe_status == 'inactive' ? 'selected' : '' }} value="inactive">{{ __('admin.Disable') }}</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Existing Image') }}</label>
                                        <div>
                                            <img src="{{ asset($basic_payment->stripe_image) }}" alt="" class="w_200">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('New Image') }}</label>
                                        <input type="file" name="stripe_image" class="form-control-file">
                                    </div>

                                    <button class="btn btn-primary">{{ __('admin.Update') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1>{{ __('Paypal Payment') }}</h1>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('admin.update-paypal') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ __('admin.Account Mode') }}</label>
                                                <select name="paypal_account_mode" id="paypal_account_mode" class="form-control">
                                                    <option {{ $basic_payment->paypal_account_mode == 'live' ? 'selected' : '' }} value="live">{{ __('admin.Live') }}</option>
                                                    <option {{ $basic_payment->paypal_account_mode == 'sandbox' ? 'selected' : '' }} value="sandbox">{{ __('admin.Sandbox') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ __('Currency Name') }}</label>
                                                <select name="paypal_currency_id" id="" class="form-control">
                                                    <option value="">{{ __('Select Currency') }}</option>
                                                    @foreach ($currencies as $currency)
                                                        <option {{ $basic_payment->paypal_currency_id == $currency->id ? 'selected' : '' }} value="{{ $currency->id }}">{{ $currency->currency_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ __('Gateway charge (%)') }}</label>
                                                <input type="text" class="form-control" name="paypal_charge" value="{{ $basic_payment->paypal_charge }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ __('Client Id') }}</label>
                                                @if (env('APP_MODE') == 'DEMO')
                                                    <input type="text" class="form-control" name="paypal_client_id" value="PAYPAL-TEST-CLIENT98934343-343-ID">
                                                @else
                                                    <input type="text" class="form-control" name="paypal_client_id" value="{{ $basic_payment->paypal_client_id }}">
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ __('Secret Key') }}</label>
                                                @if (env('APP_MODE') == 'DEMO')
                                                    <input type="text" class="form-control" name="paypal_secret_key" value="PAYPAL-TEST-398439483-SECRET-KEY">
                                                @else
                                                    <input type="text" class="form-control" name="paypal_secret_key" value="{{ $basic_payment->paypal_secret_key }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ __('Status') }}</label>
                                                <select name="paypal_status" id="paypal_status" class="form-control">
                                                    <option {{ $basic_payment->paypal_status == 'active' ? 'selected' : '' }} value="active">{{ __('admin.Enable') }}</option>
                                                    <option {{ $basic_payment->paypal_status == 'inactive' ? 'selected' : '' }} value="inactive">{{ __('admin.Disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Existing Image') }}</label>
                                        <div>
                                            <img src="{{ asset($basic_payment->paypal_image) }}" alt="" class="w_200">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('New Image') }}</label>
                                        <input type="file" name="paypal_image" class="form-control-file">
                                    </div>

                                    <button class="btn btn-primary">{{ __('admin.Update') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1>{{ __('Direct Bank Payment') }}</h1>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.update-bank-payment') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="">{{ __('Currency Name') }}</label>
                                        <select name="bank_currency_id" id="" class="form-control">
                                            <option value="">{{ __('Select Currency') }}</option>
                                            @foreach ($currencies as $currency)
                                                <option {{ $basic_payment->bank_currency_id == $currency->id ? 'selected' : '' }} value="{{ $currency->id }}">{{ $currency->currency_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('Gateway charge (%)') }}</label>
                                        <input type="text" class="form-control" name="bank_charge" value="{{ $basic_payment->bank_charge }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('Status') }}</label>
                                        <select name="bank_status" id="bank_status" class="form-control">
                                            <option {{ $basic_payment->bank_status == 'active' ? 'selected' : '' }} value="active">{{ __('admin.Enable') }}</option>
                                            <option {{ $basic_payment->bank_status == 'inactive' ? 'selected' : '' }} value="inactive">{{ __('admin.Disable') }}</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('Account Information') }}</label>
                                        <textarea name="bank_information" id="" cols="30" rows="10" class="text-area-5 form-control">{{ $basic_payment->bank_information }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Existing Image') }}</label>
                                        <div>
                                            <img src="{{ asset($basic_payment->bank_image) }}" alt="" class="w_200">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('New Image') }}</label>
                                        <input type="file" name="bank_image" class="form-control-file">
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

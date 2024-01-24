@extends('admin.master_layout')
@section('title')
<title>{{ __('Payment Gateway') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Payment Gateway') }}</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div id="accordion">
                            <div class="card">
                              <div class="card-header" id="headingOne">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h6>{{ __('Razorpay') }}</h6>
                                  </button>
                              </div>

                              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body ml-3">
                                    <form action="{{ route('admin.razorpay-update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Currency Name') }}</label>
                                                <select name="razorpay_currency_id" id="" class="form-control">
                                                    <option value="">{{ __('Select Currency') }}</option>
                                                    @foreach ($currencies as $currency)
                                                        <option {{ $payment_setting->razorpay_currency_id == $currency->id ? 'selected' : '' }} value="{{ $currency->id }}">{{ $currency->currency_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Gateway charge (%)') }}</label>
                                                <input type="text" class="form-control" name="razorpay_charge" value="{{ $payment_setting->razorpay_charge }}">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Razorpay key') }}</label>
                                                @if (env('APP_MODE') == 'DEMO')
                                                    <input type="text" class="form-control" name="razorpay_key" value="demo-razorpay-39394343-test-key">
                                                @else
                                                    <input type="text" class="form-control" name="razorpay_key" value="{{ $payment_setting->razorpay_key }}">
                                                @endif
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Razorpay secret') }}</label>
                                                @if (env('APP_MODE') == 'DEMO')
                                                    <input type="text" class="form-control" name="razorpay_secret" value="demo-razorpay-8384934-test-secret">
                                                @else
                                                    <input type="text" class="form-control" name="razorpay_secret" value="{{ $payment_setting->razorpay_secret }}">
                                                @endif
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Razorpay App Name') }}</label>
                                                <input type="text" class="form-control" name="razorpay_name" value="{{ $payment_setting->razorpay_name }}">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Razorpay Description') }}</label>
                                                <input type="text" class="form-control" name="razorpay_description" value="{{ $payment_setting->razorpay_description }}">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Theme color') }}</label>
                                                <input type="color" class="form-control" name="razorpay_theme_color" value="{{ $payment_setting->razorpay_theme_color }}">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Status') }}</label>
                                                <select name="razorpay_status" id="razorpay_status" class="form-control">
                                                    <option {{ $payment_setting->razorpay_status == 'active' ? 'selected' : '' }} value="active">{{ __('admin.Enable') }}</option>
                                                    <option {{ $payment_setting->razorpay_status == 'inactive' ? 'selected' : '' }} value="inactive">{{ __('admin.Disable') }}</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="">{{ __('admin.Existing Image') }}</label>
                                            <div>
                                                <img src="{{ asset($payment_setting->razorpay_image) }}" alt="" class="w_200">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">{{ __('New Image') }}</label>
                                            <input type="file" name="razorpay_image" class="form-control-file">
                                        </div>

                                        <button class="btn btn-primary">{{ __('admin.Update') }}</button>
                                    </form>

                                </div>
                              </div>
                            </div>

                            <div class="card">
                              <div class="card-header" id="headingTwo">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h6>{{ __('Flutterwave') }}</h6>
                                </button>
                              </div>
                              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <form action="{{ route('admin.flutterwave-update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Currency Name') }}</label>
                                                <select name="flutterwave_currency_id" id="" class="form-control">
                                                    <option value="">{{ __('Select Currency') }}</option>
                                                    @foreach ($currencies as $currency)
                                                        <option {{ $payment_setting->flutterwave_currency_id == $currency->id ? 'selected' : '' }} value="{{ $currency->id }}">{{ $currency->currency_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Gateway charge (%)') }}</label>
                                                <input type="text" class="form-control" name="flutterwave_charge" value="{{ $payment_setting->flutterwave_charge }}">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Public key') }}</label>
                                                @if (env('APP_MODE') == 'DEMO')
                                                    <input type="text" class="form-control" name="flutterwave_public_key" value="flutterwave-test-348949439-public-key">
                                                @else
                                                    <input type="text" class="form-control" name="flutterwave_public_key" value="{{ $payment_setting->flutterwave_public_key }}">
                                                @endif
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Secret key') }}</label>
                                                @if (env('APP_MODE') == 'DEMO')
                                                    <input type="text" class="form-control" name="flutterwave_secret_key" value="demo-flutterwave-8384934-key-secret">
                                                @else
                                                    <input type="text" class="form-control" name="flutterwave_secret_key" value="{{ $payment_setting->flutterwave_secret_key }}">
                                                @endif
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Flutterwave App Name') }}</label>
                                                <input type="text" class="form-control" name="flutterwave_app_name" value="{{ $payment_setting->flutterwave_app_name }}">
                                            </div>


                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Status') }}</label>
                                                <select name="flutterwave_status" id="flutterwave_status" class="form-control">
                                                    <option {{ $payment_setting->flutterwave_status == 'active' ? 'selected' : '' }} value="active">{{ __('admin.Enable') }}</option>
                                                    <option {{ $payment_setting->flutterwave_status == 'inactive' ? 'selected' : '' }} value="inactive">{{ __('admin.Disable') }}</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="">{{ __('admin.Existing Image') }}</label>
                                            <div>
                                                <img src="{{ asset($payment_setting->flutterwave_image) }}" alt="" class="w_200">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">{{ __('New Image') }}</label>
                                            <input type="file" name="flutterwave_image" class="form-control-file">
                                        </div>

                                        <button class="btn btn-primary">{{ __('admin.Update') }}</button>
                                    </form>
                                </div>
                              </div>
                            </div>

                            <div class="card">
                              <div class="card-header" id="headingThree">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h6>{{ __('Paystack') }}</h6>
                                    </button>
                              </div>
                              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    <form action="{{ route('admin.paystack-update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Currency Name') }}</label>
                                                <select name="paystack_currency_id" id="" class="form-control">
                                                    <option value="">{{ __('Select Currency') }}</option>
                                                    @foreach ($currencies as $currency)
                                                        <option {{ $payment_setting->paystack_currency_id == $currency->id ? 'selected' : '' }} value="{{ $currency->id }}">{{ $currency->currency_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Gateway charge (%)') }}</label>
                                                <input type="text" class="form-control" name="paystack_charge" value="{{ $payment_setting->paystack_charge }}">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Public key') }}</label>
                                                @if (env('APP_MODE') == 'DEMO')
                                                    <input type="text" class="form-control" name="paystack_public_key" value="paystack-test-348949439-public-key">
                                                @else
                                                    <input type="text" class="form-control" name="paystack_public_key" value="{{ $payment_setting->paystack_public_key }}">
                                                @endif
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Secret key') }}</label>
                                                @if (env('APP_MODE') == 'DEMO')
                                                    <input type="text" class="form-control" name="paystack_secret_key" value="demo-paystack-8384934-key-secret">
                                                @else
                                                    <input type="text" class="form-control" name="paystack_secret_key" value="{{ $payment_setting->paystack_secret_key }}">
                                                @endif
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="">{{ __('Status') }}</label>
                                                <select name="paystack_status" id="paystack_status" class="form-control">
                                                    <option {{ $payment_setting->paystack_status == 'active' ? 'selected' : '' }} value="active">{{ __('admin.Enable') }}</option>
                                                    <option {{ $payment_setting->paystack_status == 'inactive' ? 'selected' : '' }} value="inactive">{{ __('admin.Disable') }}</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="">{{ __('admin.Existing Image') }}</label>
                                            <div>
                                                <img src="{{ asset($payment_setting->paystack_image) }}" alt="" class="w_200">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">{{ __('New Image') }}</label>
                                            <input type="file" name="paystack_image" class="form-control-file">
                                        </div>

                                        <button class="btn btn-primary">{{ __('admin.Update') }}</button>
                                    </form>
                                </div>
                              </div>
                            </div>

                            <div class="card">
                              <div class="card-header" id="mollieTab">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseMollie" aria-expanded="false" aria-controls="collapseMollie">
                                    <h6>{{ __('Mollie') }}</h6>
                                    </button>
                              </div>
                              <div id="collapseMollie" class="collapse" aria-labelledby="mollieTab" data-parent="#accordion">
                                <div class="card-body">
                                    <form action="{{ route('admin.mollie-update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Currency Name') }}</label>
                                                <select name="mollie_currency_id" id="" class="form-control">
                                                    <option value="">{{ __('Select Currency') }}</option>
                                                    @foreach ($currencies as $currency)
                                                        <option {{ $payment_setting->mollie_currency_id == $currency->id ? 'selected' : '' }} value="{{ $currency->id }}">{{ $currency->currency_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Gateway charge (%)') }}</label>
                                                <input type="text" class="form-control" name="mollie_charge" value="{{ $payment_setting->mollie_charge }}">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Mollie key') }}</label>
                                                @if (env('APP_MODE') == 'DEMO')
                                                    <input type="text" class="form-control" name="mollie_key" value="mollie-test-348949439-key">
                                                @else
                                                    <input type="text" class="form-control" name="mollie_key" value="{{ $payment_setting->mollie_key }}">
                                                @endif
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Status') }}</label>
                                                <select name="mollie_status" id="mollie_status" class="form-control">
                                                    <option {{ $payment_setting->mollie_status == 'active' ? 'selected' : '' }} value="active">{{ __('admin.Enable') }}</option>
                                                    <option {{ $payment_setting->mollie_status == 'inactive' ? 'selected' : '' }} value="inactive">{{ __('admin.Disable') }}</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="">{{ __('admin.Existing Image') }}</label>
                                            <div>
                                                <img src="{{ asset($payment_setting->mollie_image) }}" alt="" class="w_200">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">{{ __('New Image') }}</label>
                                            <input type="file" name="mollie_image" class="form-control-file">
                                        </div>

                                        <button class="btn btn-primary">{{ __('admin.Update') }}</button>
                                    </form>
                                </div>
                              </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="instamojoTab">
                                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseInstamojo" aria-expanded="false" aria-controls="collapseInstamojo">
                                      <h6>{{ __('Instamojo') }}</h6>
                                      </button>
                                </div>
                                <div id="collapseInstamojo" class="collapse" aria-labelledby="instamojoTab" data-parent="#accordion">
                                  <div class="card-body">
                                      <form action="{{ route('admin.instamojo-update') }}" method="POST" enctype="multipart/form-data">
                                          @csrf
                                          @method('PUT')

                                          <div class="row">

                                              <div class="form-group col-md-6">
                                                  <label for="">{{ __('Currency Name') }}</label>
                                                  <select name="instamojo_currency_id" id="" class="form-control">
                                                      <option value="">{{ __('Select Currency') }}</option>
                                                      @foreach ($currencies as $currency)
                                                          <option {{ $payment_setting->instamojo_currency_id == $currency->id ? 'selected' : '' }} value="{{ $currency->id }}">{{ $currency->currency_name }}
                                                          </option>
                                                      @endforeach
                                                  </select>
                                              </div>

                                              <div class="form-group col-md-6">
                                                  <label for="">{{ __('Gateway charge (%)') }}</label>
                                                  <input type="text" class="form-control" name="instamojo_charge" value="{{ $payment_setting->instamojo_charge }}">
                                              </div>

                                              <div class="form-group col-md-6">
                                                  <label for="">{{ __('API key') }}</label>
                                                  @if (env('APP_MODE') == 'DEMO')
                                                      <input type="text" class="form-control" name="instamojo_api_key" value="instamojo-test-348949439-api-key">
                                                  @else
                                                      <input type="text" class="form-control" name="instamojo_api_key" value="{{ $payment_setting->instamojo_api_key }}">
                                                  @endif
                                              </div>

                                              <div class="form-group col-md-6">
                                                  <label for="">{{ __('Auth token') }}</label>
                                                  @if (env('APP_MODE') == 'DEMO')
                                                      <input type="text" class="form-control" name="instamojo_auth_token" value="instamojo-auth-348949439-token">
                                                  @else
                                                      <input type="text" class="form-control" name="instamojo_auth_token" value="{{ $payment_setting->instamojo_auth_token }}">
                                                  @endif
                                              </div>

                                              <div class="form-group col-md-6">
                                                  <label for="">{{ __('Account Mode') }}</label>
                                                  <select name="instamojo_account_mode" id="instamojo_account_mode" class="form-control">
                                                      <option {{ $payment_setting->instamojo_account_mode == 'Sandbox' ? 'selected' : '' }} value="Sandbox">{{ __('Sandbox') }}</option>
                                                      <option {{ $payment_setting->instamojo_account_mode == 'Live' ? 'selected' : '' }} value="Live">{{ __('Live') }}</option>
                                                  </select>
                                              </div>

                                              <div class="form-group col-md-6">
                                                  <label for="">{{ __('Status') }}</label>
                                                  <select name="instamojo_status" id="instamojo_status" class="form-control">
                                                      <option {{ $payment_setting->instamojo_status == 'active' ? 'selected' : '' }} value="active">{{ __('admin.Enable') }}</option>
                                                      <option {{ $payment_setting->instamojo_status == 'inactive' ? 'selected' : '' }} value="inactive">{{ __('admin.Disable') }}</option>
                                                  </select>
                                              </div>



                                          </div>

                                          <div class="form-group">
                                              <label for="">{{ __('admin.Existing Image') }}</label>
                                              <div>
                                                  <img src="{{ asset($payment_setting->instamojo_image) }}" alt="" class="w_200">
                                              </div>
                                          </div>

                                          <div class="form-group">
                                              <label for="">{{ __('New Image') }}</label>
                                              <input type="file" name="instamojo_image" class="form-control-file">
                                          </div>

                                          <button class="btn btn-primary">{{ __('admin.Update') }}</button>
                                      </form>
                                  </div>
                                </div>
                              </div>





                          </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

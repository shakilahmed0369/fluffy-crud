<?php

namespace Modules\BasicPayment\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use  Modules\BasicPayment\app\Models\BasicPayment;
use Modules\Currency\app\Models\MultiCurrency;
use File;

class BasicPaymentController extends Controller
{

    public function basicpayment()
    {
        abort_unless(checkAdminHasPermission('basic.payment.view'), 403);
        $payment_info = BasicPayment::get();

        $basic_payment = array();

        foreach($payment_info as $payment_item)
        {
            $basic_payment[$payment_item->key] = $payment_item->value;
        }

        $basic_payment = (object) $basic_payment;

        $currencies = MultiCurrency::get();

        return view('basicpayment::basicpayment', compact('basic_payment', 'currencies'));
    }

    public function update_stripe(Request $request)
    {
        abort_unless(checkAdminHasPermission('basic.payment.update'), 403);
        $rules = [
            'stripe_key' => 'required',
            'stripe_secret' => 'required',
            'stripe_currency_id' => 'required',
            'stripe_charge' => 'required|numeric',
        ];
        $customMessages = [
            'stripe_key.required' => trans('Stripe key is required'),
            'stripe_secret.required' => trans('Stripe secret is required'),
            'stripe_currency_id.required' => trans('Currency is required'),
            'stripe_charge.required' => trans('Gateway charge is required'),
            'stripe_charge.numeric' => trans('Gateway charge should be numeric'),
        ];

        $request->validate($rules,$customMessages);

        BasicPayment::where('key', 'stripe_key')->update(['value' => $request->stripe_key]);
        BasicPayment::where('key', 'stripe_secret')->update(['value' => $request->stripe_secret]);
        BasicPayment::where('key', 'stripe_currency_id')->update(['value' => $request->stripe_currency_id]);
        BasicPayment::where('key', 'stripe_charge')->update(['value' => $request->stripe_charge]);
        BasicPayment::where('key', 'stripe_status')->update(['value' => $request->stripe_status]);

        if($request->file('stripe_image')){
            $stripe_setting = BasicPayment::where('key', 'stripe_image')->first();
            $file_name = file_upload($request->stripe_image, $stripe_setting->value, 'uploads/website-images/');
            $stripe_setting->value = $file_name;
            $stripe_setting->save();
        }

        $notification = trans('Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function update_paypal(Request $request)
    {
        abort_unless(checkAdminHasPermission('basic.payment.update'), 403);

        $rules = [
            'paypal_client_id' => 'required',
            'paypal_secret_key' => 'required',
            'paypal_currency_id' => 'required',
            'paypal_charge' => 'required|numeric',
        ];

        $customMessages = [
            'paypal_client_id.required' => trans('Client is required'),
            'paypal_secret_key.required' => trans('Secret key is required'),
            'paypal_currency_id.required' => trans('Currency is required'),
            'paypal_charge.required' => trans('Gateway charge is required'),
            'paypal_charge.numeric' => trans('Gateway charge should be numeric'),
        ];

        $request->validate($rules,$customMessages);

        BasicPayment::where('key', 'paypal_client_id')->update(['value' => $request->paypal_client_id]);
        BasicPayment::where('key', 'paypal_secret_key')->update(['value' => $request->paypal_secret_key]);
        BasicPayment::where('key', 'paypal_currency_id')->update(['value' => $request->paypal_currency_id]);
        BasicPayment::where('key', 'paypal_charge')->update(['value' => $request->paypal_charge]);
        BasicPayment::where('key', 'paypal_status')->update(['value' => $request->paypal_status]);
        BasicPayment::where('key', 'paypal_account_mode')->update(['value' => $request->paypal_account_mode]);

        if($request->file('paypal_image')){
            $paypal_setting = BasicPayment::where('key', 'paypal_image')->first();
            $file_name = file_upload($request->paypal_image, $paypal_setting->value, 'uploads/website-images/');
            $paypal_setting->value = $file_name;
            $paypal_setting->save();
        }

        $notification = trans('Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function update_bank_payment(Request $request)
    {
        abort_unless(checkAdminHasPermission('basic.payment.update'), 403);

        $rules = [
            'bank_information' => 'required',
            'bank_currency_id' => 'required',
            'bank_charge' => 'required|numeric',
        ];

        $customMessages = [
            'bank_information.required' => trans('Bank information is required'),
            'bank_currency_id.required' => trans('Currency is required'),
            'bank_charge.required' => trans('Gateway charge is required'),
            'bank_charge.numeric' => trans('Gateway charge should be numeric'),
        ];

        $request->validate($rules,$customMessages);

        BasicPayment::where('key', 'bank_information')->update(['value' => $request->bank_information]);
        BasicPayment::where('key', 'bank_currency_id')->update(['value' => $request->bank_currency_id]);
        BasicPayment::where('key', 'bank_charge')->update(['value' => $request->bank_charge]);
        BasicPayment::where('key', 'bank_status')->update(['value' => $request->bank_status]);

        if($request->file('bank_image')){
            $bank_setting = BasicPayment::where('key', 'bank_image')->first();
            $file_name = file_upload($request->bank_image, $bank_setting->value, 'uploads/website-images/');
            $bank_setting->value = $file_name;
            $bank_setting->save();
        }

        $notification = trans('Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }
}

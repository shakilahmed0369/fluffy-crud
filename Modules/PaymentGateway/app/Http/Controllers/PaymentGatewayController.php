<?php

namespace Modules\PaymentGateway\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use  Modules\PaymentGateway\app\Models\PaymentGateway;
use Modules\Currency\app\Models\MultiCurrency;

class PaymentGatewayController extends Controller
{

    public function paymentgateway()
    {
        abort_unless(checkAdminHasPermission('payment.view'), 403);
        $payment_info = PaymentGateway::get();

        $payment_setting = array();
        foreach($payment_info as $payment_item){
            $payment_setting[$payment_item->key] = $payment_item->value;
        }

        $payment_setting = (object)$payment_setting;
        $currencies = MultiCurrency::get();

        return view('paymentgateway::paymentgateway', compact('payment_setting','currencies'));
    }

    public function razorpay_update(Request $request){
        abort_unless(checkAdminHasPermission('payment.update'), 403);
        $rules = [
            'razorpay_key' => 'required',
            'razorpay_secret' => 'required',
            'razorpay_currency_id' => 'required',
            'razorpay_charge' => 'required|numeric',
            'razorpay_name' => 'required',
            'razorpay_description' => 'required',
            'razorpay_theme_color' => 'required',
        ];
        $customMessages = [
            'razorpay_key.required' => trans('Razorpay key is required'),
            'razorpay_secret.required' => trans('Razorpay secret is required'),
            'razorpay_currency_id.required' => trans('Currency is required'),
            'razorpay_charge.required' => trans('Gateway charge is required'),
            'razorpay_charge.numeric' => trans('Gateway charge should be numeric'),
            'razorpay_name.required' => trans('Name is required'),
            'razorpay_description.required' => trans('Description is required'),
            'razorpay_theme_color.required' => trans('Theme is required'),
        ];

        $request->validate($rules,$customMessages);

        PaymentGateway::where('key', 'razorpay_key')->update(['value' => $request->razorpay_key]);
        PaymentGateway::where('key', 'razorpay_secret')->update(['value' => $request->razorpay_secret]);
        PaymentGateway::where('key', 'razorpay_currency_id')->update(['value' => $request->razorpay_currency_id]);
        PaymentGateway::where('key', 'razorpay_charge')->update(['value' => $request->razorpay_charge]);
        PaymentGateway::where('key', 'razorpay_status')->update(['value' => $request->razorpay_status]);
        PaymentGateway::where('key', 'razorpay_name')->update(['value' => $request->razorpay_name]);
        PaymentGateway::where('key', 'razorpay_description')->update(['value' => $request->razorpay_description]);
        PaymentGateway::where('key', 'razorpay_theme_color')->update(['value' => $request->razorpay_theme_color]);

        if($request->file('razorpay_image')){
            $razorpay_setting = PaymentGateway::where('key', 'razorpay_image')->first();
            $file_name = file_upload($request->razorpay_image, $razorpay_setting->value, 'uploads/website-images/');
            $razorpay_setting->value = $file_name;
            $razorpay_setting->save();
        }

        $notification = trans('Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function flutterwave_update(Request $request){
        abort_unless(checkAdminHasPermission('payment.update'), 403);
        $rules = [
            'flutterwave_public_key' => 'required',
            'flutterwave_secret_key' => 'required',
            'flutterwave_currency_id' => 'required',
            'flutterwave_charge' => 'required|numeric',
            'flutterwave_app_name' => 'required',
        ];
        $customMessages = [
            'flutterwave_public_key.required' => trans('Public key is required'),
            'flutterwave_secret_key.required' => trans('Secret key is required'),
            'flutterwave_currency_id.required' => trans('Currency is required'),
            'flutterwave_charge.required' => trans('Gateway charge is required'),
            'flutterwave_charge.numeric' => trans('Gateway charge should be numeric'),
            'flutterwave_app_name.required' => trans('Name is required'),
        ];

        $request->validate($rules,$customMessages);

        PaymentGateway::where('key', 'flutterwave_currency_id')->update(['value' => $request->flutterwave_currency_id]);
        PaymentGateway::where('key', 'flutterwave_charge')->update(['value' => $request->flutterwave_charge]);
        PaymentGateway::where('key', 'flutterwave_public_key')->update(['value' => $request->flutterwave_public_key]);
        PaymentGateway::where('key', 'flutterwave_secret_key')->update(['value' => $request->flutterwave_secret_key]);
        PaymentGateway::where('key', 'flutterwave_app_name')->update(['value' => $request->flutterwave_app_name]);
        PaymentGateway::where('key', 'flutterwave_status')->update(['value' => $request->flutterwave_status]);

        if($request->file('flutterwave_image')){
            $flutterwave_setting = PaymentGateway::where('key', 'flutterwave_image')->first();
            $file_name = file_upload($request->flutterwave_image, $flutterwave_setting->value, 'uploads/website-images/');
            $flutterwave_setting->value = $file_name;
            $flutterwave_setting->save();
        }

        $notification = trans('Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function paystack_update(Request $request){
        abort_unless(checkAdminHasPermission('payment.update'), 403);
        $rules = [
            'paystack_public_key' => 'required',
            'paystack_secret_key' => 'required',
            'paystack_currency_id' => 'required',
            'paystack_charge' => 'required|numeric'
        ];
        $customMessages = [
            'paystack_public_key.required' => trans('Public key is required'),
            'paystack_secret_key.required' => trans('Secret key is required'),
            'paystack_currency_id.required' => trans('Currency is required'),
            'paystack_charge.required' => trans('Gateway charge is required'),
            'paystack_charge.numeric' => trans('Gateway charge should be numeric')
        ];

        $request->validate($rules,$customMessages);

        PaymentGateway::where('key', 'paystack_currency_id')->update(['value' => $request->paystack_currency_id]);
        PaymentGateway::where('key', 'paystack_charge')->update(['value' => $request->paystack_charge]);
        PaymentGateway::where('key', 'paystack_public_key')->update(['value' => $request->paystack_public_key]);
        PaymentGateway::where('key', 'paystack_secret_key')->update(['value' => $request->paystack_secret_key]);
        PaymentGateway::where('key', 'paystack_status')->update(['value' => $request->paystack_status]);

        if($request->file('paystack_image')){
            $paystack_setting = PaymentGateway::where('key', 'paystack_image')->first();
            $file_name = file_upload($request->paystack_image, $paystack_setting->value, 'uploads/website-images/');
            $paystack_setting->value = $file_name;
            $paystack_setting->save();
        }

        $notification = trans('Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function mollie_update(Request $request){
        abort_unless(checkAdminHasPermission('payment.update'), 403);
        $rules = [
            'mollie_key' => 'required',
            'mollie_currency_id' => 'required',
            'mollie_charge' => 'required|numeric'
        ];
        $customMessages = [
            'mollie_key.required' => trans('Mollie key is required'),
            'mollie_currency_id.required' => trans('Currency is required'),
            'mollie_charge.required' => trans('Gateway charge is required'),
            'mollie_charge.numeric' => trans('Gateway charge should be numeric')
        ];

        $request->validate($rules,$customMessages);

        PaymentGateway::where('key', 'mollie_currency_id')->update(['value' => $request->mollie_currency_id]);
        PaymentGateway::where('key', 'mollie_charge')->update(['value' => $request->mollie_charge]);
        PaymentGateway::where('key', 'mollie_key')->update(['value' => $request->mollie_key]);
        PaymentGateway::where('key', 'mollie_status')->update(['value' => $request->mollie_status]);

        if($request->file('mollie_image')){
            $mollie_setting = PaymentGateway::where('key', 'mollie_image')->first();
            $file_name = file_upload($request->mollie_image, $mollie_setting->value, 'uploads/website-images/');
            $mollie_setting->value = $file_name;
            $mollie_setting->save();
        }

        $notification = trans('Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function instamojo_update(Request $request){
        abort_unless(checkAdminHasPermission('payment.update'), 403);
        $rules = [
            'instamojo_api_key' => 'required',
            'instamojo_auth_token' => 'required',
            'instamojo_currency_id' => 'required',
            'instamojo_charge' => 'required|numeric'
        ];
        $customMessages = [
            'instamojo_api_key.required' => trans('API key is required'),
            'instamojo_auth_token.required' => trans('Auth token is required'),
            'instamojo_currency_id.required' => trans('Currency is required'),
            'instamojo_charge.required' => trans('Gateway charge is required'),
            'instamojo_charge.numeric' => trans('Gateway charge should be numeric')
        ];

        $request->validate($rules,$customMessages);

        PaymentGateway::where('key', 'instamojo_currency_id')->update(['value' => $request->instamojo_currency_id]);
        PaymentGateway::where('key', 'instamojo_charge')->update(['value' => $request->instamojo_charge]);
        PaymentGateway::where('key', 'instamojo_api_key')->update(['value' => $request->instamojo_api_key]);
        PaymentGateway::where('key', 'instamojo_auth_token')->update(['value' => $request->instamojo_auth_token]);
        PaymentGateway::where('key', 'instamojo_status')->update(['value' => $request->instamojo_status]);
        PaymentGateway::where('key', 'instamojo_account_mode')->update(['value' => $request->instamojo_account_mode]);

        if($request->file('instamojo_image')){
            $instamojo_setting = PaymentGateway::where('key', 'instamojo_image')->first();
            $file_name = file_upload($request->instamojo_image, $instamojo_setting->value, 'uploads/website-images/');
            $instamojo_setting->value = $file_name;
            $instamojo_setting->save();
        }

        $notification = trans('Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


}

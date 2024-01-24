<?php

namespace Modules\Currency\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Currency\app\Models\MultiCurrency;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_unless(checkAdminHasPermission('currency.view'), 403);
        $currencies = MultiCurrency::get();

        return view('currency::index', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(checkAdminHasPermission('currency.create'), 403);
        return view('currency::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_unless(checkAdminHasPermission('currency.store'), 403);
        $rules = [
            'currency_name'=>'required|unique:multi_currencies',
            'country_code'=>'required|unique:multi_currencies',
            'currency_code'=>'required|unique:multi_currencies',
            'currency_icon'=>'required|unique:multi_currencies',
            'currency_rate'=>'required|numeric',
        ];
        $customMessages = [
            'currency_name.required' => trans('Currency name is required'),
            'currency_name.unique' => trans('Currency name already exist'),
            'country_code.required' => trans('Country code is required'),
            'country_code.unique' => trans('Country code already exist'),
            'currency_code.required' => trans('Currency code is required'),
            'currency_code.unique' => trans('Currency code already exist'),
            'currency_icon.required' => trans('Currency icon is required'),
            'currency_icon.unique' => trans('Currency icon already exist'),
            'currency_rate.required' => trans('Currency rate is required'),
            'currency_rate.numeric' => trans('Currency rate must be number'),
        ];

        $request->validate($rules,$customMessages);

        $currency = new MultiCurrency();

        if($request->is_default == 'yes'){
            MultiCurrency::where(['is_default' => 'yes'])->update(['is_default' => 'no']);
        }

        $currency->currency_name = $request->currency_name;
        $currency->country_code = $request->country_code;
        $currency->currency_code = $request->currency_code;
        $currency->currency_icon = $request->currency_icon;
        $currency->currency_rate = $request->currency_rate;
        $currency->is_default = $request->is_default;
        $currency->currency_position = $request->currency_position;
        $currency->status = $request->status;
        $currency->save();

        $notification=trans('Created Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        abort_unless(checkAdminHasPermission('currency.edit'), 403);
        $currency = MultiCurrency::findOrFail($id);

        return view('currency::edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        abort_unless(checkAdminHasPermission('currency.update'), 403);
        $rules = [
            'currency_name'=>'required|unique:multi_currencies,currency_name,'.$id,
            'country_code'=>'required|unique:multi_currencies,country_code,'.$id,
            'currency_code'=>'required|unique:multi_currencies,currency_code,'.$id,
            'currency_icon'=>'required|unique:multi_currencies,currency_icon,'.$id,
            'currency_rate'=>'required|numeric',
        ];
        $customMessages = [
            'currency_name.required' => trans('Currency name is required'),
            'currency_name.unique' => trans('Currency name already exist'),
            'country_code.required' => trans('Country code is required'),
            'country_code.unique' => trans('Country code already exist'),
            'currency_code.required' => trans('Currency code is required'),
            'currency_code.unique' => trans('Currency code already exist'),
            'currency_icon.required' => trans('Currency icon is required'),
            'currency_icon.unique' => trans('Currency icon already exist'),
            'currency_rate.required' => trans('Currency rate is required'),
            'currency_rate.numeric' => trans('Currency rate must be number'),
        ];

        $request->validate($rules,$customMessages);

        $currency = MultiCurrency::findOrFail($id);

        if($request->is_default == 'yes'){
            MultiCurrency::where(['is_default' => 'yes'])->update(['is_default' => 'no']);
        }

        if($currency->is_default == 'yes' && $request->is_default == 'no'){
            MultiCurrency::where('id', 1)->update(['is_default' => 'yes']);
        }

        $currency->currency_name = $request->currency_name;
        $currency->country_code = $request->country_code;
        $currency->currency_code = $request->currency_code;
        $currency->currency_icon = $request->currency_icon;
        $currency->currency_rate = $request->currency_rate;
        $currency->is_default = $request->is_default;
        $currency->currency_position = $request->currency_position;
        $currency->status = $request->status;
        $currency->save();

        $notification=trans('Updated Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.currency.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        abort_unless(checkAdminHasPermission('currency.delete'), 403);

        return "pending, admin can not be able to delete item when currency has assign to payment gateway";
        $currency = MultiCurrency::find($id);
        if($currency->is_default == 'yes'){
            MultiCurrency::where('id', 1)->update(['is_default' => 'yes']);
        }
        $currency->delete();

        $notification = trans('Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.currency.index')->with($notification);

        $is_flutterwave = Flutterwave::where('currency_id', $id)->first();
        $is_instamojo = InstamojoPayment::where('currency_id', $id)->first();
        $is_paypal = PaypalPayment::where('currency_id', $id)->first();
        $is_paystack = PaystackAndMollie::where('paystack_currency_id', $id)->first();
        $is_mollie = PaystackAndMollie::where('mollie_currency_id', $id)->first();
        $is_razorpay = RazorpayPayment::where('currency_id', $id)->first();
        $is_sslcommerz = SslcommerzPayment::where('currency_id', $id)->first();
        $is_stripe = StripePayment::where('currency_id', $id)->first();

        if($is_flutterwave || $is_instamojo || $is_paypal || $is_paystack || $is_mollie || $is_razorpay || $is_sslcommerz || $is_stripe){
            $notification = trans('You can not delete this currency. Because there are one or more payment method has been created in this currency.');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('admin.currency.index')->with($notification);
        }else{
            $currency->delete();
            $notification = trans('Delete Successfully');
            $notification = array('messege'=>$notification,'alert-type'=>'success');
            return redirect()->route('admin.currency.index')->with($notification);
        }
    }
}

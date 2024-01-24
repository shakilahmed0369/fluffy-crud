<?php

namespace Modules\Coupon\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Coupon\app\Models\Coupon;
use Modules\Coupon\app\Models\CouponHistory;

class CouponController extends Controller
{
    public function index(){

        $coupons = Coupon::where(['author_id' => 0])->latest()->get();

        return view('coupon::index', compact('coupons'));
    }

    public function store(Request $request){
        $rules = [
            'coupon_code'=>'required|unique:coupons',
            'offer_percentage'=>'required|numeric',
            'min_price'=>'required|numeric',
            'expired_date'=>'required',
        ];
        $customMessages = [
            'coupon_code.required' => trans('Coupon code is required'),
            'coupon_code.unique' => trans('Coupon already exist'),
            'offer_percentage.required' => trans('Offer percentage is required'),
            'expired_date.required' => trans('Expired date is required'),
            'min_price.required' => trans('Minimum price is required'),
        ];

        $this->validate($request, $rules, $customMessages);

        $coupon = new Coupon();
        $coupon->author_id = 0;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->offer_percentage = $request->offer_percentage;
        $coupon->min_price = $request->min_price;
        $coupon->expired_date = $request->expired_date;
        $coupon->status = $request->status;
        $coupon->save();

        $notification= trans('Created Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function update(Request $request, $id){
        $rules = [
            'coupon_code'=>'required|unique:coupons,coupon_code,'.$id,
            'offer_percentage'=>'required|numeric',
            'min_price'=>'required|numeric',
            'expired_date'=>'required',
        ];
        $customMessages = [
            'coupon_code.required' => trans('Coupon code is required'),
            'coupon_code.unique' => trans('Coupon already exist'),
            'offer_percentage.required' => trans('Offer percentage is required'),
            'expired_date.required' => trans('Expired date is required'),
            'min_price.required' => trans('Minimum price is required'),
        ];

        $this->validate($request, $rules, $customMessages);

        $coupon = Coupon::find($id);
        $coupon->coupon_code = $request->coupon_code;
        $coupon->offer_percentage = $request->offer_percentage;
        $coupon->min_price = $request->min_price;
        $coupon->expired_date = $request->expired_date;
        $coupon->status = $request->status;
        $coupon->save();

        $notification= trans('Updated Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function destroy($id){
        $coupon = Coupon::find($id);
        $coupon->delete();

        $notification= trans('Deleted Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function coupon_history(){

        $coupon_histories = CouponHistory::where(['author_id' => 0])->latest()->get();

        return view('coupon::history', ['coupon_histories' => $coupon_histories]);
    }
}

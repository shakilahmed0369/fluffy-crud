<?php

namespace Modules\Order\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Order\app\Models\Order;
use App\Models\User;

use Modules\Order\app\Jobs\PaymentRejectJob;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('user')->latest()->get();

        $title = trans('Order History');

        return view('order::index', ['orders' => $orders, 'title' => $title]);
    }

    public function pending_order()
    {
        $orders = Order::with('user')->where('order_status', 'pending')->latest()->get();

        $title = trans('Pending Order');

        return view('order::index', ['orders' => $orders, 'title' => $title]);
    }



    public function pending_payment()
    {
        $orders = Order::with('user')->where('payment_status', 'pending')->latest()->get();

        $title = trans('Pending Payment');

        return view('order::index', ['orders' => $orders, 'title' => $title]);
    }

    public function rejected_payment()
    {
        $orders = Order::with('user')->where('payment_status', 'rejected')->latest()->get();

        $title = trans('Rejected Payment');

        return view('order::index', ['orders' => $orders, 'title' => $title]);
    }





    public function show($order_id)
    {
        $order = Order::where('order_id', $order_id)->firstOrFail();

        return view('order::show', ['order' => $order]);
    }


    public function order_payment_reject(Request $request, $id){

        $request->validate([
            'subject'=>'required',
            'description'=>'required',
        ],[
            'subject.required' => trans('Subject is required'),
            'description.required' => trans('Description is required'),
        ]);

        $order = Order::findOrFail($id);
        $order->payment_status = 'rejected';
        $order->save();

        $user = User::findOrFail($order->user_id);

        dispatch(new PaymentRejectJob($request->subject, $request->description, $user));

        $notification = trans('Payment rejected successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function order_payment_approved(Request $request, $id){

        $request->validate([
            'subject'=>'required',
            'description'=>'required',
        ],[
            'subject.required' => trans('Subject is required'),
            'description.required' => trans('Description is required'),
        ]);

        $order = Order::findOrFail($id);
        $order->payment_status = 'success';
        $order->save();

        $user = User::findOrFail($order->user_id);

        dispatch(new PaymentRejectJob($request->subject, $request->description, $user));

        $notification = trans('Payment approved successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        $notification = trans('Payment approved successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.orders')->with($notification);
    }
}

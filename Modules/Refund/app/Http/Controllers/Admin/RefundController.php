<?php

namespace Modules\Refund\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Refund\app\Models\RefundRequest;
use Modules\Order\app\Models\Order;
use App\Models\User;
use Modules\Refund\app\Jobs\RefundRejectJob;
use Modules\Refund\app\Jobs\RefundApprovalJob;

class RefundController extends Controller
{

    public function index()
    {
        $refund_requests = RefundRequest::with('user','order')->latest()->get();

        $title = trans('Refund History');

        return view('refund::admin.index', ['refund_requests' => $refund_requests, 'title' => $title]);
    }

    public function pending_refund_request()
    {
        $refund_requests = RefundRequest::with('user','order')->where('status', 'pending')->latest()->get();

        $title = trans('Pending Refund');

        return view('refund::admin.index', ['refund_requests' => $refund_requests, 'title' => $title]);
    }

    public function rejected_refund_request()
    {
        $refund_requests = RefundRequest::with('user','order')->where('status', 'rejected')->latest()->get();

        $title = trans('Rejected Refund');

        return view('refund::admin.index', ['refund_requests' => $refund_requests, 'title' => $title]);
    }

    public function complete_refund_request()
    {
        $refund_requests = RefundRequest::with('user','order')->where('status', 'success')->latest()->get();

        $title = trans('Complete Refund');

        return view('refund::admin.index', ['refund_requests' => $refund_requests, 'title' => $title]);
    }





    public function show($id)
    {
        $refund_request = RefundRequest::with('user','order')->findOrFail($id);

        return view('refund::admin.show', ['refund_request' => $refund_request]);
    }


    public function destroy($id)
    {
        $refund_request = RefundRequest::findOrFail($id);
        $refund_request->delete();

        $notification = trans('Payment approved successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.refund-request')->with($notification);
    }

    public function approved_refund_request(Request $request, $id){
        $request->validate([
            'refund_amount' => 'required|numeric'
        ],[
            'refund_amount.required' => trans('Amount is required'),
            'refund_amount.numeric' => trans('Amount should be numeric')
        ]);

        $refund_request = RefundRequest::findOrFail($id);
        $refund_request->refund_amount = $request->refund_amount;
        $refund_request->status = 'success';
        $refund_request->save();

        $user = User::findOrFail($refund_request->user_id);
        dispatch(new RefundApprovalJob($request->refund_amount, $user));

        $notification = trans('Refund approved successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function reject_refund_request(Request $request, $id){

        $request->validate([
            'subject'=>'required',
            'description'=>'required',
        ],[
            'subject.required' => trans('Subject is required'),
            'description.required' => trans('Description is required'),
        ]);

        $refund_request = RefundRequest::findOrFail($id);
        $refund_request->status = 'rejected';
        $refund_request->save();

        $user = User::findOrFail($refund_request->user_id);
        dispatch(new RefundRejectJob($request->subject, $request->description, $user));

        $notification = trans('Refund rejected successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }


}

<?php

namespace Modules\PaymentWithdraw\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\PaymentWithdraw\app\Models\WithdrawMethod;
use Modules\PaymentWithdraw\app\Models\WithdrawRequest;
use Modules\PaymentWithdraw\app\Jobs\WithdrawApprovalJob;
use App\Models\User;

class WithdrawMethodController extends Controller
{
    public function index(){

        $methods = WithdrawMethod::all();

        return view('paymentwithdraw::admin.method.index', compact('methods'));
    }

    public function create(){
        return view('paymentwithdraw::admin.method.create');
    }

    public function store(Request $request){
        $rules = [
            'name' => 'required',
            'minimum_amount' => 'required|numeric',
            'maximum_amount' => 'required|numeric',
            'withdraw_charge' => 'required|numeric',
            'description' => 'required',
        ];
        $customMessages = [
            'name.required' => trans('Name is required'),
            'minimum_amount.required' => trans('Min amount is required'),
            'maximum_amount.required' => trans('Max amount is required'),
            'withdraw_charge.required' => trans('Charge is required'),
            'description.required' => trans('Description is required'),
        ];
        $request->validate($rules,$customMessages);

        $method = new WithdrawMethod();
        $method->name = $request->name;
        $method->min_amount = $request->minimum_amount;
        $method->max_amount = $request->maximum_amount;
        $method->withdraw_charge = $request->withdraw_charge;
        $method->description = $request->description;
        $method->status = $request->status;
        $method->save();

        $notification=trans('Create Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.withdraw-method.index')->with($notification);
    }

    public function edit($id){
        $method = WithdrawMethod::find($id);
        return view('paymentwithdraw::admin.method.edit', compact('method'));
    }

    public function update(Request $request, $id){

        $rules = [
            'name' => 'required',
            'minimum_amount' => 'required|numeric',
            'maximum_amount' => 'required|numeric',
            'withdraw_charge' => 'required|numeric',
            'description' => 'required',
        ];
        $customMessages = [
            'name.required' => trans('Name is required'),
            'minimum_amount.required' => trans('Min amount is required'),
            'maximum_amount.required' => trans('Max amount is required'),
            'withdraw_charge.required' => trans('Charge is required'),
            'description.required' => trans('Description is required'),
        ];

        $this->validate($request, $rules,$customMessages);

        $method = WithdrawMethod::find($id);
        $method->name = $request->name;
        $method->min_amount = $request->minimum_amount;
        $method->max_amount = $request->maximum_amount;
        $method->withdraw_charge = $request->withdraw_charge;
        $method->description = $request->description;
        $method->status = $request->status;
        $method->save();

        $notification=trans('Update Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.withdraw-method.index')->with($notification);
    }

    public function destroy($id){

        $method = WithdrawMethod::find($id);
        $method->delete();

        $notification=trans('Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.withdraw-method.index')->with($notification);
    }

    public function withdraw_list(Request $request){

        $withdraws = WithdrawRequest::with('user')->latest()->get();

        $title = trans('Withdraw request');

        return view('paymentwithdraw::admin.index', compact('withdraws', 'title'));
    }

    public function pending_withdraw_list(Request $request){

        $withdraws = WithdrawRequest::with('user')->where('status', 'pending')->latest()->get();

        $title = trans('Pendig withdraw');

        return view('paymentwithdraw::admin.index', compact('withdraws', 'title'));
    }

    public function show_withdraw($id){

        $withdraw = WithdrawRequest::find($id);

        return view('paymentwithdraw::admin.show', compact('withdraw'));
    }

    public function destroy_withdraw($id){

        $withdraw = WithdrawRequest::findOrFail($id);
        $withdraw->delete();

        $notification = trans('Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.withdraw-list')->with($notification);
    }

    public function approved_withdraw($id){

        $withdraw = WithdrawRequest::find($id);
        $withdraw->status = 'approved';
        $withdraw->approved_date = date('Y-m-d');
        $withdraw->save();

        $user = User::findOrFail($withdraw->user_id);
        dispatch(new WithdrawApprovalJob($user));

        $notification = trans('Withdraw request approval successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.withdraw-list')->with($notification);

    }
}

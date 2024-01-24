<?php

namespace Modules\Subscription\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Subscription\app\Models\SubscriptionPlan;

class SubscriptionPlanController extends Controller
{
    public function index()
    {
        $plans = SubscriptionPlan::orderBy('serial','asc')->get();

        return view('subscription::admin.subscription_list', compact('plans'));
    }


    public function create()
    {
        return view('subscription::admin.subscription_create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'plan_name' => 'required',
            'plan_price' => 'required|numeric',
            'expiration_date' => 'required',
            'serial' => 'required',
            'status' => 'required',
        ],[
            'plan_name.required' => trans('Plan name is required'),
            'plan_price.required' => trans('Plan price is required'),
            'plan_price.numeric' => trans('Plan price should be numeric'),
            'expiration_date.required' => trans('Expiration date is required'),
            'serial.required' => trans('Serial is required')
        ]);

        $plan = new SubscriptionPlan();
        $plan->plan_name = $request->plan_name;
        $plan->plan_price = $request->plan_price;
        $plan->expiration_date = $request->expiration_date;
        $plan->serial = $request->serial;
        $plan->status = $request->status;
        $plan->save();

        $notification = trans('Create Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.subscription-plan.index')->with($notification);
    }

    public function show($id)
    {
        return view('subscription::show');
    }

    public function edit($id)
    {

        $plan = SubscriptionPlan::find($id);

        return view('subscription::admin.subscription_edit', compact('plan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plan_name' => 'required',
            'plan_price' => 'required|numeric',
            'expiration_date' => 'required',
            'serial' => 'required',
            'status' => 'required',
        ],[
            'plan_name.required' => trans('Plan name is required'),
            'plan_price.required' => trans('Plan price is required'),
            'plan_price.numeric' => trans('Plan price should be numeric'),
            'expiration_date.required' => trans('Expiration date is required'),
            'serial.required' => trans('Serial is required')
        ]);

        $plan = SubscriptionPlan::find($id);
        $plan->plan_name = $request->plan_name;
        $plan->plan_price = $request->plan_price;
        $plan->expiration_date = $request->expiration_date;
        $plan->serial = $request->serial;
        $plan->status = $request->status;
        $plan->save();

        $notification = trans('Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.subscription-plan.index')->with($notification);
    }


    public function destroy($id)
    {
        $plan = SubscriptionPlan::find($id);
        $plan->delete();

        $notification = trans('Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.subscription-plan.index')->with($notification);

    }


}

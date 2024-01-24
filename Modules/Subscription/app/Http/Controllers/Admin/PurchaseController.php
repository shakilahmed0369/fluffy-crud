<?php

namespace Modules\Subscription\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Subscription\app\Models\SubscriptionHistory;
use Modules\Subscription\app\Models\SubscriptionPlan;
use App\Models\User;

class PurchaseController extends Controller
{

    public function index()
    {
        $histories = SubscriptionHistory::with('user')->orderBy('id','desc')->paginate(30);

        $title = trans('Transaction History');

        return view('subscription::admin.purchase_history', compact('histories', 'title'));
    }

    public function pending_payment()
    {
        $histories = SubscriptionHistory::with('user')->orderBy('id','desc')->where('payment_status','pending')->paginate(30);

        $title = trans('Pending Transaction');

        return view('subscription::admin.purchase_history', compact('histories','title'));
    }

    public function subscription_history()
    {
        $histories = SubscriptionHistory::with('user')->orderBy('id','desc')->where('status','active')->paginate(30);

        return view('subscription::admin.subscription_history', compact('histories'));
    }


    public function create()
    {

        $plans = SubscriptionPlan::where('status', 'active')->orderBy('serial','asc')->get();

        $users = User::all();

        return view('subscription::admin.assign_plan', compact('plans','users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'plan_id' => 'required',
        ],[
            'user_id.required' => trans('User is required'),
            'plan_id.required' => trans('Plan is required'),
        ]);

        $plan = SubscriptionPlan::find($request->plan_id);

        if($plan->expiration_date == 'monthly'){
            $expiration_date = date('Y-m-d', strtotime('30 days'));
        }elseif($plan->expiration_date == 'yearly'){
            $expiration_date = date('Y-m-d', strtotime('365 days'));
        }elseif($plan->expiration_date == 'lifetime'){
            $expiration_date = 'lifetime';
        }

        $this->store_pricing_plan($request->user_id , $plan, $expiration_date);

        $notification = trans('Assign Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function show($id)
    {
        $history = SubscriptionHistory::with('user')->where('id', $id)->first();

        return view('subscription::admin.purchase_history_show', compact('history'));
    }

    public function approved_plan_payment($id){

        $history = SubscriptionHistory::where('id', $id)->first();

        SubscriptionHistory::where('user_id', $history->user_id)->update(['status' => 'expired']);

        $history->payment_status = 'success';
        $history->status = 'active';
        $history->save();

        $notification = trans('Approved Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function plan_renew($id){
        $current_plan = SubscriptionHistory::where('id', $id)->first();
        if($current_plan->expiration != 'lifetime'){

            if($current_plan->expiration_date <= date('Y-m-d')){

                $plan = SubscriptionPlan::find($current_plan->subscription_plan_id);

                if($plan->expiration_date == 'monthly'){
                    $expiration_date = date('Y-m-d', strtotime('30 days'));
                }elseif($plan->expiration_date == 'yearly'){
                    $expiration_date = date('Y-m-d', strtotime('365 days'));
                }elseif($plan->expiration_date == 'lifetime'){
                    $expiration_date = 'lifetime';
                }

                $this->store_pricing_plan($current_plan->user_id , $plan, $expiration_date);

            }else{
                $plan = SubscriptionPlan::find($current_plan->subscription_plan_id);

                if($plan->expiration_date == 'monthly'){
                    $expiration_date = date('Y-m-d', strtotime($current_plan->expiration_date. ' +30 days'));
                }elseif($plan->expiration_date == 'yearly'){
                    $expiration_date = date('Y-m-d', strtotime($current_plan->expiration_date. ' +365 days'));
                }elseif($plan->expiration_date == 'lifetime'){
                    $expiration_date = 'lifetime';
                }

                $this->store_pricing_plan($current_plan->user_id , $plan, $expiration_date);
            }
        }

        $notification = trans('Subscription renew successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function delete_plan_payment($id)
    {
        $history = SubscriptionHistory::where('id', $id)->first();

        if($history->status == 'active'){
            $active_latest = SubscriptionHistory::where('user_id', $history->user_id)->where('id', '!=', $id)->orderBy('id','desc')->first();

            if($active_latest){
                $active_latest->status = 'active';
                $active_latest->save();
            }
        }
        $history->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.plan-transaction-history')->with($notification);

    }

    public function store_pricing_plan($user_id , $plan, $expiration_date){

        SubscriptionHistory::where('user_id', $user_id)->update(['status' => 'expired']);

        $purchase = new SubscriptionHistory();
        $purchase->user_id = $user_id;
        $purchase->subscription_plan_id = $plan->id;
        $purchase->plan_name = $plan->plan_name;
        $purchase->plan_price = $plan->plan_price;
        $purchase->expiration = $plan->expiration_date;
        $purchase->expiration_date = $expiration_date;
        $purchase->status = 'active';
        $purchase->payment_method = 'handcash';
        $purchase->payment_status = 'success';
        $purchase->transaction = 'hand_cash';
        $purchase->save();

    }
}

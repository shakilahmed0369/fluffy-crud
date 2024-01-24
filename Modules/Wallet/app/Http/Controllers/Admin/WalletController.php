<?php

namespace Modules\Wallet\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Wallet\app\Models\WalletHistory;
use App\Models\User;
use Modules\Wallet\app\Jobs\WalletPaymentRejectJob;
use Modules\Wallet\app\Jobs\WalletPaymentApprovalJob;

class WalletController extends Controller
{

    public function index()
    {
        $wallet_histories = WalletHistory::latest()->get();

        $title = trans('Wallet History');


        return view('wallet::admin.index', ['wallet_histories' => $wallet_histories, 'title' => $title]);
    }

    public function pending_wallet_payment()
    {
        $wallet_histories = WalletHistory::where('payment_status', 'pending')->latest()->get();

        $title = trans('Pending Wallet Payment');

        return view('wallet::admin.index', ['wallet_histories' => $wallet_histories, 'title' => $title]);
    }

    public function rejected_wallet_payment()
    {
        $wallet_histories = WalletHistory::where('payment_status', 'rejected')->latest()->get();

        $title = trans('Pending Wallet Payment');

        return view('wallet::admin.index', ['wallet_histories' => $wallet_histories, 'title' => $title]);
    }



    public function show($id)
    {
        $wallet_history = WalletHistory::findOrFail($id);

        return view('wallet::admin.show', ['wallet_history' => $wallet_history]);
    }


    public function destroy($id)
    {
        $wallet_history = WalletHistory::findOrFail($id);
        $wallet_history->delete();

        $notification = trans('Payment delete successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.wallet-history')->with($notification);
    }

    public function rejected_wallet_request(Request $request, $id){

        $request->validate([
            'subject'=>'required',
            'description'=>'required',
        ],[
            'subject.required' => trans('Subject is required'),
            'description.required' => trans('Description is required'),
        ]);

        $wallet_history = WalletHistory::findOrFail($id);
        $wallet_history->payment_status = 'rejected';
        $wallet_history->save();

        $user = User::findOrFail($wallet_history->user_id);
        dispatch(new WalletPaymentRejectJob($request->subject, $request->description, $user));

        $notification = trans('Wallet request rejected successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function approved_wallet_request(Request $request, $id){

        $wallet_history = WalletHistory::findOrFail($id);
        $wallet_history->payment_status = 'success';
        $wallet_history->save();

        $user = User::findOrFail($wallet_history->user_id);

        $wallet_balance = $user->wallet_balance;
        $wallet_balance +=  $wallet_history->amount;
        $user->wallet_balance = $wallet_balance;
        $user->save();

        dispatch(new WalletPaymentApprovalJob($user));

        $notification = trans('Wallet payment approval successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }
}

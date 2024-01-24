<?php

namespace Modules\Customer\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Modules\Customer\app\Models\BannedHistory;
use App\Traits\GetGlobalInformationTrait;
use Hash, Mail, Exception, File;
use Illuminate\Support\Str;
use Modules\Customer\app\Emails\SendMailToUser;
use App\Mail\UserRegistration;
use Modules\GlobalSetting\app\Models\EmailTemplate;

use Modules\Customer\app\Jobs\SendBulkEmailToUser;
use App\Jobs\SendVerifyMailToUser;
use Modules\Customer\app\Jobs\SendUserBannedMailJob;

class CustomerController extends Controller
{

    use GetGlobalInformationTrait;

    public function index()
    {
        abort_unless(checkAdminHasPermission('customer.view'), 403);

        $users = User::orderBy('id','desc')->get();

        return view('customer::all_customer')->with([
            'users' => $users,
        ]);
    }

    public function active_customer()
    {
        abort_unless(checkAdminHasPermission('customer.view'), 403);

        $users = User::where(['status' => 'active', 'is_banned' => 'no'])->where('email_verified_at', '!=', null)->orderBy('id','desc')->get();

        return view('customer::active_customer')->with([
            'users' => $users,
        ]);
    }

    public function non_verified_customers()
    {
        abort_unless(checkAdminHasPermission('customer.view'), 403);

        $users = User::where('email_verified_at', null)->orderBy('id','desc')->get();

        return view('customer::non_verified_customer')->with([
            'users' => $users,
        ]);
    }

    public function banned_customers()
    {
        abort_unless(checkAdminHasPermission('customer.view'), 403);

        $users = User::where('is_banned', 'yes')->orderBy('id','desc')->get();

        return view('customer::banned_customer')->with([
            'users' => $users,
        ]);
    }


    public function show($id)
    {
        abort_unless(checkAdminHasPermission('customer.view'), 403);

        $user = User::findOrFail($id);

        $banned_histories = BannedHistory::where('user_id', $id)->orderBy('id','desc')->get();

        return view('customer::customer_show')->with([
            'user' => $user,
            'banned_histories' => $banned_histories,
        ]);
    }

    public function update(Request $request, $id)
    {
        abort_unless(checkAdminHasPermission('customer.update'), 403);

        $rules = [
            'name'=>'required',
            'address'=>'required'
        ];
        $customMessages = [
            'name.required' => trans('Name is required'),
            'address.required' => trans('Address is required')
        ];
        $request->validate($rules,$customMessages);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        $notification=trans('Updated Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function password_change(Request $request, $id)
    {
        abort_unless(checkAdminHasPermission('customer.update'), 403);

        $rules = [
            'password'=>'required|min:4|confirmed',
        ];
        $customMessages = [
            'password.required' => trans('Password is required'),
            'password.min' => trans('Password minimum 4 character'),
            'password.confirmed' => trans('Confirm password does not match'),
        ];
        $this->validate($request, $rules,$customMessages);

        $user = User::findOrFail($id);

        $user->password = Hash::make($request->password);
        $user->save();

        $notification = trans('Password change successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function send_banned_request(Request $request, $id)
    {
        abort_unless(checkAdminHasPermission('customer.update'), 403);

        $rules = [
            'subject'=>'required|max:255',
            'description'=>'required'
        ];
        $customMessages = [
            'subject.required' => trans('Subject is required'),
            'description.required' => trans('Description is required'),
        ];

        $this->validate($request, $rules,$customMessages);

        $user = User::findOrFail($id);
        if($user->is_banned == 'yes'){
            $user->is_banned = 'no';
            $user->save();

            $banned = new BannedHistory();
            $banned->user_id = $id;
            $banned->subject = $request->subject;
            $banned->reasone = 'for_unbanned';
            $banned->description = $request->description;
            $banned->save();
        }else{
            $user->is_banned = 'yes';
            $user->save();

            $banned = new BannedHistory();
            $banned->user_id = $id;
            $banned->subject = $request->subject;
            $banned->reasone = 'for_banned';
            $banned->description = $request->description;
            $banned->save();
        }

        dispatch(new SendUserBannedMailJob($request->description, $request->subject, $user));

        $notification = trans('Banned request successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function send_verify_request(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->verification_token = Str::random(100);
        $user->save();

        dispatch(new SendVerifyMailToUser('single_user', $user));

        $notification= trans('A varification link has been send to user mail');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function send_verify_request_to_all(Request $request)
    {

        dispatch(new SendVerifyMailToUser('all_user'));

        $notification= trans('A varification link has been send to user mail');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function send_mail_to_customer(Request $request, $id)
    {
        $rules = [
            'subject'=>'required|max:255',
            'description'=>'required'
        ];
        $customMessages = [
            'subject.required' => trans('Subject is required'),
            'description.required' => trans('Description is required'),
        ];

        $this->validate($request, $rules,$customMessages);

        $user = User::findOrFail($id);

        dispatch(new SendBulkEmailToUser($request->subject, $request->description, 'single_user', $user));

        $notification = trans('Mail send to customer successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function send_bulk_mail(){
        abort_unless(checkAdminHasPermission('customer.bulk.mail'), 403);
        return view('customer::send_bulk_mail');
    }

    public function send_bulk_mail_to_all(Request $request)
    {
        abort_unless(checkAdminHasPermission('customer.bulk.mail'), 403);

        $rules = [
            'subject'=>'required|max:255',
            'description'=>'required'
        ];

        $customMessages = [
            'subject.required' => trans('Subject is required'),
            'description.required' => trans('Description is required'),
        ];

        $this->validate($request, $rules,$customMessages);

        dispatch(new SendBulkEmailToUser($request->subject, $request->description, 'all_user'));

        $notification = trans('Mail send to customer successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function destroy($id)
    {
        abort_unless(checkAdminHasPermission('customer.delete'), 403);

        $user = User::findOrFail($id);
        if ($user->image) {
            if (File::exists(public_path($user->image))) unlink(public_path($user->image));
        }

        $user->delete();

        $notification = trans('Customer deleted successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.active-customers')->with($notification);
    }
}

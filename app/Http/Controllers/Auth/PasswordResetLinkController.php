<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use Str, Cache, Mail, Exception;
use App\Traits\GetGlobalInformationTrait;
use Modules\GlobalSetting\app\Models\EmailTemplate;
use App\Mail\UserForgetPassword;
use App\Rules\CustomRecaptcha;
use App\Models\User;
use App\Jobs\UserForgetPasswordJob;

class PasswordResetLinkController extends Controller
{
    use GetGlobalInformationTrait;

    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }

    public function custom_forget_password(Request $request){

        $setting = Cache::get('setting');

        $request->validate([
            'email' => ['required', 'email'],
            'g-recaptcha-response'=> $setting->recaptcha_status == 'active' ? ['required', new CustomRecaptcha()] : ''
        ],[
            'email.required' => trans('admin_validation.Email is required'),
            'g-recaptcha-response.required' => trans('Please complete the recaptcha to submit the form'),
        ]);

        $user = User::where('email', $request->email)->first();

        if($user){
            $user->forget_password_token = Str::random(100);
            $user->save();

            dispatch(new UserForgetPasswordJob($user));

            $notification= trans('admin_validation.A password reset link has been send to your mail');
            $notification = array('messege'=>$notification,'alert-type'=>'success');
            return redirect()->back()->with($notification);

        }else{
            $notification = trans('admin_validation.Email does not exist');
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }


        MailHelper::setMailConfig();

        $status = Password::sendResetLink(
            $request->only('email')
        );

        $notification= trans('admin_validation.A password reset link has been send to your mail');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
    }
}

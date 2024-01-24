<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Rules\CustomRecaptcha;
use Str, Cache, Mail, Exception;
use App\Traits\GetGlobalInformationTrait;
use Modules\GlobalSetting\app\Models\EmailTemplate;
use App\Mail\UserRegistration;
use App\Jobs\SendVerifyMailToUser;

class RegisteredUserController extends Controller
{
    use GetGlobalInformationTrait;

    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $setting = Cache::get('setting');

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 'min:4', 'max:100'],
            'g-recaptcha-response'=> $setting->recaptcha_status == 'active' ? ['required', new CustomRecaptcha()] : ''
        ],[
            'name.required' => trans('admin_validation.Name is required'),
            'email.required' => trans('admin_validation.Email is required'),
            'email.unique' => trans('admin_validation.Email already exist'),
            'password.required' => trans('admin_validation.Password is required'),
            'password.confirmed' => trans('admin_validation.Confirm password does not match'),
            'password.min' => trans('admin_validation.You have to provide minimum 4 character password'),
            'g-recaptcha-response.required' => trans('Please complete the recaptcha to submit the form'),
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'status' => 'active',
            'is_banned' => 'no',
            'password' => Hash::make($request->password),
            'verification_token' => Str::random(100),
        ]);

        dispatch(new SendVerifyMailToUser('single_user', $user));

        $notification= trans('admin_validation.A varification link has been send to your mail, please verify and enjoy our service');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function custom_user_verification($token){
        $user = User::where('verification_token',$token)->first();
        if($user){

            if($user->email_verified_at != null){
                $notification = trans('admin_validation.Email already verified');
                $notification = array('messege'=>$notification,'alert-type'=>'error');
                return redirect()->route('login')->with($notification);
            }

            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->verification_token = null;
            $user->save();

            $notification = trans('Verification Successfully, please try to login now');
            $notification = array('messege'=>$notification,'alert-type'=>'success');
            return redirect()->route('login')->with($notification);
        }else{
            $notification = trans('admin_validation.Invalid token');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('register')->with($notification);
        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use App\Rules\CustomRecaptcha;
use Str, Cache, Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $setting = Cache::get('setting');

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => $setting->recaptcha_status == 'active' ? ['required', new CustomRecaptcha()] : ''
        ];

        $customMessages = [
            'email.required' => trans('admin_validation.Email is required'),
            'password.required' => trans('admin_validation.Password is required'),
            'g-recaptcha-response.required' => trans('Please complete the recaptcha to submit the form'),
        ];
        $this->validate($request, $rules, $customMessages);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($user->status == UserStatus::ACTIVE->value) {
                if ($user->is_banned == UserStatus::UNBANNED->value) {
                    if ($user->email_verified_at == null) {
                        $notification = trans('admin_validation.Please verify your email');
                        $notification = array('messege' => $notification, 'alert-type' => 'error');
                        return redirect()->back()->with($notification);
                    }

                    if (Hash::check($request->password, $user->password)) {
                        if (Auth::guard('web')->attempt($credential, $request->remember)) {

                            $notification = trans('admin_validation.Login Successfully');
                            $notification = array('messege' => $notification, 'alert-type' => 'success');

                            return redirect()->intended(route('dashboard'))->with($notification);
                        }
                    } else {
                        $notification = trans('admin_validation.Invalid Password');
                        $notification = array('messege' => $notification, 'alert-type' => 'error');
                        return redirect()->back()->with($notification);
                    }
                } else {
                    $notification = trans('admin_validation.Inactive account');
                    $notification = array('messege' => $notification, 'alert-type' => 'error');
                    return redirect()->back()->with($notification);
                }
            } else {
                $notification = trans('admin_validation.Inactive account');
                $notification = array('messege' => $notification, 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = trans('admin_validation.Invalid Email');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $notification = trans('admin_validation.Logout Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->route('login')->with($notification);
    }
}

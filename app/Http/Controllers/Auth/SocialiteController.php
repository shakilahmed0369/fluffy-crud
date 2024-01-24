<?php

namespace App\Http\Controllers\Auth;

use App\Enums\SocialiteDriverType;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\NewUserCreateTrait;
use App\Traits\SetConfigTrait;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    use SetConfigTrait, NewUserCreateTrait;

    public function __construct()
    {
        $driver = request('driver', null);
        if ($driver == SocialiteDriverType::FACEBOOK->value) {
            self::setFacebookLoginInfo();
        } elseif ($driver == SocialiteDriverType::GOOGLE->value) {
            self::setGoogleLoginInfo();
        }
    }

    public function redirectToDriver($driver)
    {
        if (in_array($driver, SocialiteDriverType::getAll())) {
            return Socialite::driver($driver)->redirect();
        }
        $notification = trans('Invalid Social Login Type!');
        $notification = ['messege' => $notification, 'alert-type' => 'error'];
        return redirect()->back()->with($notification);
    }

    public function handleDriverCallback($driver)
    {
        if (!in_array($driver, SocialiteDriverType::getAll())) {
            $notification = trans('Invalid Social Login Type!');
            $notification = ['messege' => $notification, 'alert-type' => 'error'];
            return redirect()->back()->with($notification);
        }
        $provider_name = SocialiteDriverType::from($driver)->value;
        $callbackUser = Socialite::driver($provider_name)->user();
        $user = User::where('email', $callbackUser->getEmail())->first();
        if ($user) {
            $findDriver = $user
                ->socialite()
                ->where(['provider_name' => $provider_name, 'provider_id' => $callbackUser->getId()])
                ->first();

            if ($findDriver) {
                if ($user->status == UserStatus::ACTIVE->value) {
                    if ($user->is_banned == UserStatus::UNBANNED->value) {
                        if (app()->isProduction() && $user->email_verified_at == null) {
                            $notification = trans('admin_validation.Please verify your email');
                            $notification = ['messege' => $notification, 'alert-type' => 'error'];
                            return redirect()
                                ->back()
                                ->with($notification);
                        }
                        if ($findDriver) {
                            Auth::guard('web')->login($findDriver, true);
                            $notification = trans('admin_validation.Login Successfully');
                            $notification = ['messege' => $notification, 'alert-type' => 'success'];
                            return redirect()
                                ->intended(route('user.dashboard'))
                                ->with($notification);
                        }
                    } else {
                        $notification = trans('admin_validation.Inactive account');
                        $notification = ['messege' => $notification, 'alert-type' => 'error'];
                        return redirect()
                            ->back()
                            ->with($notification);
                    }
                } else {
                    $notification = trans('admin_validation.Inactive account');
                    $notification = ['messege' => $notification, 'alert-type' => 'error'];
                    return redirect()
                        ->back()
                        ->with($notification);
                }
            } else {
                $socialite = $this->createNewUser(user: $user, callbackUser: $callbackUser, provider_name: $provider_name);

                if ($socialite) {
                    Auth::guard('web')->login($user, true);
                    $notification = trans('admin_validation.Login Successfully');
                    $notification = ['messege' => $notification, 'alert-type' => 'success'];

                    return redirect()
                        ->intended(route('user.dashboard'))
                        ->with($notification);
                }

                $notification = trans('admin_validation.Login Failed');
                $notification = ['messege' => $notification, 'alert-type' => 'error'];
                return redirect()
                    ->back()
                    ->with($notification);
            }
        } else {
            if ($callbackUser) {
                $socialite = $this->createNewUser(callbackUser: $callbackUser, provider_name: $provider_name);

                if ($socialite) {
                    Auth::guard('web')->login($user, true);
                    $notification = trans('admin_validation.Login Successfully');
                    $notification = ['messege' => $notification, 'alert-type' => 'success'];
                    return redirect()
                        ->intended(route('user.dashboard'))
                        ->with($notification);
                }

                $notification = trans('admin_validation.Login Failed');
                $notification = ['messege' => $notification, 'alert-type' => 'error'];
                return redirect()
                    ->back()
                    ->with($notification);
            }

            $notification = trans('admin_validation.Login Failed');
            $notification = ['messege' => $notification, 'alert-type' => 'error'];
            return redirect()
                ->back()
                ->with($notification);
        }
    }
}

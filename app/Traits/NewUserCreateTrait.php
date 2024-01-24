<?php

namespace App\Traits;

use Exception;
use App\Models\User;
use App\Enums\UserStatus;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SocialLoginDefaultPasswordMail;

trait NewUserCreateTrait
{
    private function createNewUser($user = null, $callbackUser, $provider_name)
    {
        if (!$user) {
            $password = Str::random(10);
            $user = User::create([
                'name' => $callbackUser->name,
                'email' => $callbackUser->email,
                'status' => UserStatus::ACTIVE->value,
                'is_banned' => UserStatus::UNBANNED->value,
                'image' => $callbackUser->getAvatar(),
                'email_verified_at' => now(),
                'password' => Hash::make($password),
                'verification_token' => Str::random(100),
            ]);
            try {
                Mail::to($callbackUser->email)->send(new SocialLoginDefaultPasswordMail($user, $password));
            } catch (Exception $e) {
                session(['error' => $e->getMessage()]);
                Log::error($e);
            }
        }

        $socialite = $user->socialite()->create([
            'provider_name' => $provider_name,
            'provider_id' => $callbackUser->getId(),
            'access_token' => $callbackUser->token ?? null,
            'refresh_token' => $callbackUser->refreshToken ?? null,
        ]);


        return $socialite;
    }
}

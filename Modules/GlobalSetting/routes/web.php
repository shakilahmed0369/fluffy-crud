<?php

use Illuminate\Support\Facades\Route;
use Modules\GlobalSetting\app\Http\Controllers\GlobalSettingController;
use Modules\GlobalSetting\app\Http\Controllers\EmailSettingController;


Route::group(['as'=> 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin']], function () {

    Route::controller(GlobalSettingController::class)->group(function () {

        Route::get('general-setting', 'general_setting')->name('general-setting');
        Route::put('update-general-setting', 'update_general_setting')->name('update-general-setting');

        Route::get('seo-setting', 'seo_setting')->name('seo-setting');
        Route::put('update-seo-setting/{id}', 'update_seo_setting')->name('update-seo-setting');

        Route::get('logo-favicon', 'logo_favicon')->name('logo-favicon');
        Route::put('update-logo-favicon', 'update_logo_favicon')->name('update-logo-favicon');

        Route::get('cookie-consent', 'cookie_consent')->name('cookie-consent');
        Route::put('update-cookie-consent', 'update_cookie_consent')->name('update-cookie-consent');

        Route::get('google-captcha', 'google_captcha')->name('google-captcha');
        Route::put('update-google-captcha', 'update_google_captcha')->name('update-google-captcha');

        Route::get('tawk-chat', 'tawk_chat')->name('tawk-chat');
        Route::put('update-tawk-chat', 'update_tawk_chat')->name('update-tawk-chat');

        Route::get('google-analytic', 'google_analytic')->name('google-analytic');
        Route::put('update-google-analytic', 'update_google_analytic')->name('update-google-analytic');

        Route::get('facebook-pixel', 'facebook_pixel')->name('facebook-pixel');
        Route::put('update-facebook-pixel', 'update_facebook_pixel')->name('update-facebook-pixel');

        Route::get('social-login', 'social_login')->name('social-login');
        Route::put('update-social-login', 'update_social_login')->name('update-social-login');

        Route::get('custom-pagination', 'custom_pagination')->name('custom-pagination');
        Route::put('update-custom-pagination', 'update_custom_pagination')->name('update-custom-pagination');

        Route::get('default-avatar', 'default_avatar')->name('default-avatar');
        Route::put('update-default-avatar', 'update_default_avatar')->name('update-default-avatar');

        Route::get('breadcrumb', 'breadcrumb')->name('breadcrumb');
        Route::put('update-breadcrumb', 'update_breadcrumb')->name('update-breadcrumb');

        Route::get('cache-clear', 'cache_clear')->name('cache-clear');

        Route::get('database-clear', 'database_clear')->name('database-clear');
        Route::delete('database-clear-success', 'database_clear_success')->name('database-clear-success');

        Route::get('custom-code', 'customCode')->name('custom-code');
        Route::post('update-custom-code', 'customCodeUpdate')->name('update-custom-code');


    });


    Route::controller(EmailSettingController::class)->group(function () {

        Route::get('email-configuration', 'email_config')->name('email-configuration');
        Route::put('update-email-configuration', 'update_email_config')->name('update-email-configuration');

        Route::get('email-template', 'email_template')->name('email-template');
        Route::get('edit-email-template/{id}', 'edit_email_template')->name('edit-email-template');
        Route::put('update-email-template/{id}', 'update_email_template')->name('update-email-template');

    });

});

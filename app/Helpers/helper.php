<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Modules\Language\app\Models\Language;

function file_upload($request_file, $old_file, $file_path)
{
    $extention = $request_file->getClientOriginalExtension();
    $file_name = 'wsus-img' . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
    $file_name = $file_path . $file_name;
    $request_file->move(public_path($file_path), $file_name);

    if ($old_file) {
        if (File::exists(public_path($old_file))) unlink(public_path($old_file));
    }

    return $file_name;
}
// file upload method
if (!function_exists('allLanguages')) {
    function allLanguages()
    {
        return Language::all();
    }
}

if (!function_exists('getSessionLanguage')) {
    function getSessionLanguage(): string
    {
        if (!session()->has('lang')) {
            $lang = session()->put('lang', config('app.locale'));
            session()->forget('text_direction');
            session()->put('text_direction', 'ltr');
        }

        $lang = Session::get('lang');

        return $lang;
    }
}

function admin_lang()
{
    return Session::get('admin_lang');
}

// calculate currency
function currency($price){
    // currency information will be loaded by Session value

    // $currency_icon = Session::get('currency_icon');
    // $currency_code = Session::get('currency_code');
    // $currency_rate = Session::get('currency_rate');
    // $currency_position = Session::get('currency_position');

    $currency_icon = '$';
    $currency_code = 'USD';
    $currency_rate = '1.00';
    $currency_position = 'before_price';

    $price = $price * $currency_rate;
    $price = number_format($price, 2, '.', ',');

    if($currency_position == 'before_price'){
        $price = $currency_icon.$price;
    }elseif($currency_position == 'before_price_with_space'){
        $price = $currency_icon.' '.$price;
    }elseif($currency_position == 'after_price'){
        $price = $price.$currency_icon;
    }elseif($currency_position == 'after_price_with_space'){
        $price = $price.' '.$currency_icon;
    }else{
        $price = $currency_icon.$price;
    }

    return $price;
}

// calculate currency

// custom decode and encode input value
function html_decode($text){
    $after_decode =  htmlspecialchars_decode($text, ENT_QUOTES);
    return $after_decode;
}

if (!function_exists('checkAdminHasPermission')) {
    function checkAdminHasPermission($permission):bool
    {
        return Auth::guard('admin')->user()->can($permission) ? true : false;
    }
}

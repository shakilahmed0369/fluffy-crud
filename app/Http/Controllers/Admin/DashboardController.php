<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Language\app\Models\Language;

class DashboardController extends Controller
{

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function setLanguage()
    {
        $lang = Language::whereCode(request('code'))->first();

        if (session()->has('lang')) {
            session()->forget('lang');
            session()->forget('text_direction');
        }
        if ($lang) {
            session()->put('lang', $lang->code);
            session()->put('text_direction', $lang->direction);

            $notification = trans('admin_validation.Language Changed Successfully');
            $notification = array('messege' => $notification, 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }

        session()->put('lang', config('app.locale'));

        $notification = trans('admin_validation.Language Changed Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}

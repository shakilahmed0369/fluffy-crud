<?php

namespace Modules\ClubPoint\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\GlobalSetting\app\Models\Setting;
use Modules\GlobalSetting\app\Http\Controllers\GlobalSettingController;
use Modules\ClubPoint\app\Models\ClubPointHistory;

class ClubPointController extends Controller
{

    public function index()
    {
        return view('clubpoint::admin.setting');
    }


    public function update(Request $request)
    {
        $rules = [
            'club_point_rate'=>'required|numeric'
        ];
        $customMessages = [
            'club_point_rate.required' => trans('Club point is required'),
            'club_point_rate.numeric' => trans('Club point should be numeric'),
        ];

        Setting::where('key', 'club_point_rate')->update(['value' => $request->club_point_rate]);
        Setting::where('key', 'club_point_status')->update(['value' => $request->club_point_status]);

        $cache_setting = new GlobalSettingController();
        $cache_setting->put_setting_cache();

        $notification= trans('Updated Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function history(){
        $histories = ClubPointHistory::with('order')->latest()->get();

        return view('clubpoint::admin.index', ['histories' => $histories]);
    }


}

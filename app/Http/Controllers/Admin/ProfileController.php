<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Auth, Str, Hash, File;

class ProfileController extends Controller
{
    use RedirectHelperTrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function edit_profile()
    {
        abort_unless(checkAdminHasPermission(['admin.profile.view', 'admin.profile.edit']), 403);
        $admin = Auth::guard('admin')->user();

        return view('admin.profile.edit_profile', compact('admin'));
    }

    public function profile_update(Request $request){
        abort_unless(checkAdminHasPermission('admin.profile.update'), 403);

        $admin = Auth::guard('admin')->user();
        $rules = [
            'name'=>'required',
            'email'=>'required|unique:admins,email,'.$admin->id,

        ];
        $customMessages = [
            'name.required' => trans('admin_validation.Name is required'),
            'email.required' => trans('admin_validation.Email is required'),
            'email.unique' => trans('admin_validation.Email already exist')
        ];
        $this->validate($request, $rules,$customMessages);

        $admin = Auth::guard('admin')->user();

        if($request->file('image')){
            $file_name = file_upload($request->image, $admin->image, 'uploads/website-images/');
            $admin->image = $file_name;
            $admin->save();
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        return $this->redirectWithMessage(RedirectType::UPDATE->value);
    }


    public function update_password(Request $request){
        abort_unless(checkAdminHasPermission('admin.profile.update'), 403);

        $admin = Auth::guard('admin')->user();
        $rules = [
            'current_password'=>'required',
            'password'=>'required|confirmed|min:4',
        ];
        $customMessages = [
            'current_password.required' => trans('admin_validation.Current password is required'),
            'password.required' => trans('admin_validation.Password is required'),
            'password.confirmed' => trans('admin_validation.Confirm password does not match'),
            'password.min' => trans('admin_validation.Password must be at leat 4 characters'),
        ];
        $this->validate($request, $rules,$customMessages);

        if(Hash::check($request->current_password,$admin->password)){
            $admin->password = Hash::make($request->password);
            $admin->save();

            $notification= trans('admin_validation.Password updated successfully');
            $notification=array('messege'=>$notification,'alert-type'=>'success');
            return $this->redirectWithMessage(RedirectType::UPDATE->value, '', [], $notification);

        }else{
            $notification= trans('admin_validation.Current password does not match');
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }
    }

}

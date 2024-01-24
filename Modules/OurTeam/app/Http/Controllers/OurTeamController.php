<?php

namespace Modules\OurTeam\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\OurTeam\app\Models\OurTeam;
use File;

class OurTeamController extends Controller
{
    public function index()
    {
        $teams = OurTeam::all();
        return view('ourteam::index',compact('teams'));
    }

    public function create()
    {
        return view('ourteam::create');
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required',
            'status' => 'required'
        ];
        $customMessages = [
            'name.required' => trans('Name is required'),
            'designation.required' => trans('Designation is required'),
            'image.required' => trans('Image is required')
        ];
        $this->validate($request, $rules,$customMessages);

        $team = new OurTeam();

        $file_name = '';
        if($request->file('image')){
            $file_name = file_upload($request->image, $existing_image = null, 'uploads/custom-images/');
        }

        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->image = $file_name;
        $team->status = $request->status;
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->linkedin = $request->linkedin;
        $team->instagram = $request->instagram;
        $team->save();

        $notification = trans('Created Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.ourteam.index')->with($notification);
    }


    public function edit($id)
    {
        $team = OurTeam::find($id);

        return view('ourteam::edit',compact('team'));
    }


    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'designation' => 'required',
            'status' => 'required'
        ];
        $customMessages = [
            'name.required' => trans('Name is required'),
            'designation.required' => trans('Designation is required')
        ];
        $this->validate($request, $rules,$customMessages);

        $team = OurTeam::find($id);
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->status = $request->status;
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->linkedin = $request->linkedin;
        $team->instagram = $request->instagram;
        $team->save();


        if($request->file('image')){
            $file_name = file_upload($request->image, $team->image, 'uploads/custom-images/');
            $team->image = $file_name;
            $team->save();
        }

        $notification = trans('Update Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.ourteam.index')->with($notification);
    }


    public function destroy($id)
    {
        $team = OurTeam::find($id);
        $existing_image = $team->image;
        $team->delete();

        if($existing_image){
            if(File::exists(public_path($existing_image)))unlink(public_path($existing_image));
        }

        $notification = trans('Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.ourteam.index')->with($notification);
    }



}

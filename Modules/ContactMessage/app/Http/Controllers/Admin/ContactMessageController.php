<?php

namespace Modules\ContactMessage\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\ContactMessage\app\Models\ContactMessage;

class ContactMessageController extends Controller
{

    public function index()
    {
        $messages = ContactMessage::orderBy('id', 'desc')->get();

        return view('contactmessage::index', ['messages' => $messages]);
    }


    public function show($id)
    {
        abort_unless(checkAdminHasPermission('contect.message.view'), 403);

        $message = ContactMessage::findOrFail($id);

        return view('contactmessage::show', ['message' => $message]);
    }


    public function destroy($id)
    {
        abort_unless(checkAdminHasPermission('contect.message.delete'), 403);
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        $notification = trans('Deleted successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.contact-messages')->with($notification);
    }
}

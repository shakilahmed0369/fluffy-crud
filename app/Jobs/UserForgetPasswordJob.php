<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Traits\GetGlobalInformationTrait;
use Mail, Exception;
use Modules\GlobalSetting\app\Models\EmailTemplate;
use App\Mail\UserForgetPassword;

class UserForgetPasswordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, GetGlobalInformationTrait;

    public $from_user;

    public function __construct($from_user)
    {
        $this->from_user = $from_user;
    }

    public function handle(): void
    {
        $this->set_mail_config();

        try{
            $template = EmailTemplate::where('name', 'password_reset')->first();
            $subject = $template->subject;
            $message = $template->description;
            $message = str_replace('{{user_name}}',$this->from_user->name,$message);
            Mail::to($this->from_user->email)->send(new UserForgetPassword($message,$subject,$this->from_user));
        }catch(Exception $ex){}

    }
}

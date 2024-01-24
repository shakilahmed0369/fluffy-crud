<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Traits\GetGlobalInformationTrait;
use App\Mail\UserRegistration;
use Modules\GlobalSetting\app\Models\EmailTemplate;
use App\Models\User;
use Mail, Exception;

class SendVerifyMailToUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, GetGlobalInformationTrait;

    private $user_type;
    private $user_info;

    public function __construct($user_type, $user_info = null)
    {
        $this->user_type = $user_type;
        $this->user_info = $user_info;
    }

    public function handle(): void
    {
        $this->set_mail_config();

        if($this->user_type == 'all_user'){
            $users = User::where('email_verified_at', null)->orderBy('id','desc')->get();
            foreach($users as $index => $user){
                $user->verification_token = \Illuminate\Support\Str::random(100);
                $user->save();

                try{
                    $template = EmailTemplate::where('name', 'user_verification')->first();
                    $subject = $template->subject;
                    $message = $template->message;
                    $message = str_replace('{{user_name}}', $user->name, $message);

                    Mail::to($user->email)->send(new UserRegistration($message, $subject, $user));
                }catch(Exception $ex){}
            }
        }else{
            try{
                $template = EmailTemplate::where('name', 'user_verification')->first();
                $subject = $template->subject;
                $message = $template->message;
                $message = str_replace('{{user_name}}', $this->user_info->name, $message);

                Mail::to($this->user_info->email)->send(new UserRegistration($message, $subject, $this->user_info));
            }catch(Exception $ex){}
        }

    }
}

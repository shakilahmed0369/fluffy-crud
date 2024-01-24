<?php

namespace Modules\Customer\app\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Traits\GetGlobalInformationTrait;
use Modules\Customer\app\Emails\UserBanned;
use App\Models\User;
use Mail, Exception;

class SendUserBannedMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, GetGlobalInformationTrait;

    private $mail_subject;
    private $mail_message;
    private $user_info;

    public function __construct($mail_message, $mail_subject, $user_info)
    {
        $this->mail_subject = $mail_subject;
        $this->mail_message = $mail_message;
        $this->user_info = $user_info;
    }

    public function handle(): void
    {
        try{
            $this->set_mail_config();
            Mail::to($this->user_info->email)->send(new UserBanned($this->mail_message, $this->mail_subject));
        }catch(Exception $ex){}
    }
}

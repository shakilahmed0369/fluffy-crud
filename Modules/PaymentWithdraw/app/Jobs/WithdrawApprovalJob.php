<?php

namespace Modules\PaymentWithdraw\app\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Traits\GetGlobalInformationTrait;
use Mail, Exception;
use Modules\PaymentWithdraw\app\Emails\WithdrawApprovalMail;
use Modules\GlobalSetting\app\Models\EmailTemplate;

class WithdrawApprovalJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, GetGlobalInformationTrait;

    private $mail_user;

    public function __construct($mail_user)
    {
        $this->mail_user = $mail_user;
    }


    public function handle(): void
    {
        $this->set_mail_config();

        $template = EmailTemplate::where('name', 'approved_withdraw')->first();
        $subject = $template->subject;
        $message = $template->message;
        $message = str_replace('{{user_name}}', $this->mail_user->name, $message);

        try{
            Mail::to($this->mail_user->email)->send(new WithdrawApprovalMail($subject, $message));
        }catch(Exception $ex){}
    }
}

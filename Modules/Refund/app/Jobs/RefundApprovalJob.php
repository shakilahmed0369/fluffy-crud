<?php

namespace Modules\Refund\app\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Traits\GetGlobalInformationTrait;
use Mail, Exception;
use  Modules\Refund\app\Emails\RefundApprovalMail;
use Modules\GlobalSetting\app\Models\EmailTemplate;

class RefundApprovalJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, GetGlobalInformationTrait;

    private $mail_refund_amount;
    private $mail_user;

    public function __construct($mail_refund_amount, $mail_user)
    {
        $this->mail_refund_amount = $mail_refund_amount;
        $this->mail_user = $mail_user;
    }


    public function handle(): void
    {
        $this->set_mail_config();

        $template = EmailTemplate::where('name', 'approved_refund')->first();
        $subject = $template->subject;
        $message = $template->message;
        $message = str_replace('{{user_name}}', $this->mail_user->name, $message);
        $message = str_replace('{{refund_amount}}', $this->mail_refund_amount, $message);

        try{
            Mail::to($this->mail_user->email)->send(new RefundApprovalMail($subject, $message));
        }catch(Exception $ex){}
    }
}

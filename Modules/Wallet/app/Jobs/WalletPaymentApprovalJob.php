<?php

namespace Modules\Wallet\app\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Traits\GetGlobalInformationTrait;
use Mail, Exception;
use Modules\Wallet\app\Emails\WalletPaymentApprovalMail;
use Modules\GlobalSetting\app\Models\EmailTemplate;

class WalletPaymentApprovalJob implements ShouldQueue
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

        $template = EmailTemplate::where('name', 'pending_wallet_payment')->first();
        $subject = $template->subject;
        $message = $template->message;
        $message = str_replace('{{user_name}}', $this->mail_user->name, $message);

        try{
            Mail::to($this->mail_user->email)->send(new WalletPaymentApprovalMail($subject, $message));
        }catch(Exception $ex){}
    }
}

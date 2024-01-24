<?php

namespace Modules\Order\app\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Traits\GetGlobalInformationTrait;
use Mail, Exception;
use Modules\Order\app\Emails\PaymentRejectMail;


class PaymentRejectJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, GetGlobalInformationTrait;

    private $mail_subject;
    private $mail_template;
    private $mail_user;

    public function __construct($mail_subject, $mail_template, $mail_user)
    {
        $this->mail_subject = $mail_subject;
        $this->mail_template = $mail_template;
        $this->mail_user = $mail_user;
    }

    public function handle(): void
    {
        $this->set_mail_config();

        $mail_description = str_replace('[[name]]', $this->mail_user->name, $this->mail_template);

        try{
            Mail::to($this->mail_user->email)->send(new PaymentRejectMail($this->mail_subject, $mail_description));
        }catch(Exception $ex){}

    }

}

<?php

namespace Modules\NewsLetter\app\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Traits\GetGlobalInformationTrait;
use Modules\NewsLetter\app\Emails\SendMailToNewsLetter;
use Mail, Exception;
use Modules\NewsLetter\app\Models\NewsLetter;

class SendMailToNewsletterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, GetGlobalInformationTrait;

    private $mail_subject;
    private $mail_template;

    public function __construct($mail_subject, $mail_template)
    {
        $this->mail_subject = $mail_subject;
        $this->mail_template = $mail_template;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->set_mail_config();

        $newsletters = NewsLetter::orderBy('id', 'desc')->where('status', 'verified')->get();
        foreach($newsletters as $index => $item){
            try{
                Mail::to($item->email)->send(new SendMailToNewsLetter($this->mail_subject, $this->mail_template));
            }catch(Exception $ex){}
        }

    }
}

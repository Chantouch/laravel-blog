<?php

namespace App\Jobs;

use App\Mail\EmailFeedback;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendFeedback implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $feedback;

    /**
     * Create a new job instance.
     *
     * @param $feedback
     */
    public function __construct($feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new EmailFeedback($this->feedback);
        Mail::to($this->feedback->email)->send($email);
    }
}

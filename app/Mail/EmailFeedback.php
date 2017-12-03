<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailFeedback extends Mailable
{
    use Queueable, SerializesModels;

    protected $feedback;

    /**
     * Create a new message instance.
     *
     * @param $feedback
     */
    public function __construct($feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.feedback')
            ->with(['feedback' => $this->feedback]);
    }
}

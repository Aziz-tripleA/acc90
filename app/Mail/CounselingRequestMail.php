<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CounselingRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    private $askHelp;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($askHelp)
    {
        $this->askHelp = $askHelp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { 
        return $this->subject('New Counseling Message')
        ->view('emails.newCounselingEmail')
        ->with('askHelp', $this->askHelp);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $main_message, $intro_message, $content, $outro_message, $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $main_message, $intro_message, $content, $outro_message)
    {
        $this->subject=$subject;
        $this->main_message=$main_message;
        $this->intro_message=$intro_message;
        $this->content=$content;
        $this->outro_message=$outro_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("noreply@catholicyouth.my", "ASAYO Kuala Lumpur")
                ->subject($subject)
                ->view('email.registration');
    }
}

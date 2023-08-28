<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $main_message, $intro_message, $content, $outro_message, $subject, $meets;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $main_message, $intro_message, $content, $outro_message="", $meets=false)
    {
        $this->subject=$subject;
        $this->main_message=$main_message;
        $this->meets=$meets;
        $this->intro_message=$intro_message;
        $this->content=$content;
        $this->outro_message=$outro_message;
        $this->meets=$meets;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("noreply@catholicyouth.my", "ASAYO Kuala Lumpur")
                ->subject($this->subject)
                ->view('emails.registration');
    }
}

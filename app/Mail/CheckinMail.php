<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class CheckinMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content,$baptismImg,$confirmationImg,$eucharistImg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$baptismImg,$confirmationImg,$eucharistImg)
    {
        
        $this->content=$content;
        $this->baptismImg=$baptismImg;
        $this->confirmationImg=$confirmationImg;
        $this->eucharistImg=$eucharistImg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email=$this->from("noreply@catholicyouth.my", "ASAYO Kuala Lumpur")
                ->subject("New Census Form")
                ->view('emails.checkin');
                
        if($this->baptismImg!==false) $email->attachFromStorage($this->baptismImg);
        if($this->confirmationImg!==false) $email->attachFromStorage($this->confirmationImg);
        if($this->eucharistImg!==false) $email->attachFromStorage($this->eucharistImg);
        
        
        return $email;
    }
}
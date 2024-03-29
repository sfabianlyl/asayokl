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
    public function __construct($content,$baptismImg=false,$confirmationImg=false,$eucharistImg=false)
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
                
        if($this->baptismImg!==false) $email=$email->attachFromStorage($this->baptismImg);
        if($this->confirmationImg!==false) $email=$email->attachFromStorage($this->confirmationImg);
        if($this->eucharistImg!==false) $email=$email->attachFromStorage($this->eucharistImg);
        
        
        return $email;
    }
}

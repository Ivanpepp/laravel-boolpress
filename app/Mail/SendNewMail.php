<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNewMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $lead;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($lead)
    {
        //
        $this->setLead($lead);
        
    }

    public function setLead($lead){
        $this->lead = $lead;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->replyTo($this->lead->email)->view('email.contact', compact('lead'));
    }
}

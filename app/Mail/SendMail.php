<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subscribetext;
    public $subscribe;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subscribetext,$subscribe,$subject)
    {
        //
        $this->subscribetext = $subscribetext;
        $this->subscribe = $subscribe;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('e.gruja@momentum.al')->subject($this->subject)->view('email.newsletter')->with('subscribetext', $this->subscribetext)->with('subscribe', $this->subscribe);
    }
}

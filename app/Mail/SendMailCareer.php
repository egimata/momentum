<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailCareer extends Mailable
{
    use Queueable, SerializesModels;

    public $career;
    public $applicant;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($career,$applicant,$subject)
    {
        //
        $this->career = $career;
        $this->applicant = $applicant;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('e.gruja@momentum.al')->subject($this->subject)->view('email.career')->with('career', $this->career)->with('applicant', $this->applicant);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobApplicationSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $application;
    public $job;

    public function __construct($application, $job)
    {
        $this->application = $application;
        $this->job = $job;
    }

    public function build()
    {
        return $this
            ->subject('New Job Application Received')
            ->view('emails.job-application');
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $enquiry;

    public function __construct($enquiry)
    {
        $this->enquiry = $enquiry;
    }

    public function build()
    {
        $subject = 'Enquiry Mail';
        if (!empty($this->enquiry['course_name'])) {
            $subject .= ' - ' . $this->enquiry['course_name'];
        }

        return $this->subject($subject)
            ->view('frontend.mail.enquiry_mail');
    }
}

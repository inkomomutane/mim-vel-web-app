<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailFromContacto extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $mailMessage;
    public function __construct($mailMessage)
    {
        $this->mailMessage = $mailMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from(env('MAIL_FROM_ADDRESS'),$this->mailMessage->name)
        ->tag('Contacto')
        ->subject($this->mailMessage->subject)
        ->metadata('Email: ',$this->mailMessage->email)
        ->cc($this->mailMessage->email,$this->mailMessage->name)
        ->markdown('mail.contacto')
        ->with('contactMessageText',$this->mailMessage->contactMessageText)
        ->with('email',$this->mailMessage->email)
        ->with('subject',$this->mailMessage->subject);

    }
}

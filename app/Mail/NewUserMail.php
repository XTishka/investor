<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@investering.dk')
            ->view('mails.new-user-mail')
            ->text('mails.new-user-mail_plain')
            ->with(
                [
                    'userName' => $this->mailData->user_name,
                    'userPassword' => $this->mailData->user_password,
                    'sender' => $this->mailData->sender,
                ]
            );
    }
}

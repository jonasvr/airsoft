<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    protected $data;

    /**
     * ContactMail constructor.
     * @param $data
     */
    public function __construct($data)
    {
       $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data['email'])
            ->subject('contact - site')
            ->view('contact.mail')
            ->with([
                'content' => $this->data['vraag'],
                'van' =>$this->data['email']
            ]);
    }
}

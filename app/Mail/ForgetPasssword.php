<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetPasssword extends Mailable
{
    use Queueable, SerializesModels;
    private $obj;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pin)
    {
       $this->obj = $pin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('werkdatacrm@gmail.com')->markdown('taylor.send-mail',[
            'data' => $this->obj,
        ]);
    }
}

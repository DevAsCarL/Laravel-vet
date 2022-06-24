<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\JsonResponse;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuscriberMailable extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        return $this->view('mail.suscriber')
        ->subject('Subscripcion VETSPA');
    }
}

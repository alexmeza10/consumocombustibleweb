<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class Notificacion extends Mailable
{
    public $mailData;
    public $archivoAdjunto;

    public function __construct($mailData, $archivoAdjunto)
    {
        $this->mailData = $mailData;
        $this->archivoAdjunto = $archivoAdjunto;
    }

    public function build()
    {
        return $this->view('email.notificacion')
            ->attach($this->archivoAdjunto);
    }
}
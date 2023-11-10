<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CorreoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $contenido;
    public $vista;

    /**
     * Create a new message instance.
     *
     * @param string $subject
     * @param string $contenido
     * @param string $vista
     */
    public function __construct($subject, $contenido, $vista)
    {
        $this->subject = $subject;
        $this->contenido = $contenido;
        $this->vista = $vista;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
                    ->view('emails.' . $this->vista)
                    ->with(['contenido' => $this->contenido]);
    }
}

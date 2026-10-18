<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;
    public bool $isAdmin;

    public function __construct(array $data, bool $isAdmin = false)
    {
        $this->data = $data;
        $this->isAdmin = $isAdmin;
    }

    public function envelope(): Envelope
    {
        // Pour l'admin, on permet de répondre directement au client
        $replyTo = $this->isAdmin
            ? [new Address($this->data['email'], $this->data['name'])]
            : [];

        return new Envelope(
            subject: $this->isAdmin
                ? 'Nuevo mensaje de contacto - ' . $this->data['name']
                : 'Hemos recibido su mensaje - nom-domaine',
            replyTo: $replyTo,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
            with: [
                'data'    => $this->data,
                'isAdmin' => $this->isAdmin,
            ],
        );
    }
}

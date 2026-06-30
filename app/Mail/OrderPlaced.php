<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public array $order;
    public bool $isAdmin;

    public function __construct(array $order, bool $isAdmin = false)
    {
        $this->order = $order;
        $this->isAdmin = $isAdmin;
    }

    public function envelope(): Envelope
    {
        $number = $this->order['number'] ?? '';

        return new Envelope(
            subject: $this->isAdmin
                ? "Nuevo pedido {$number}"
                : "Confirmación de su pedido {$number}",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.order-placed',
            with: [
                'order'   => $this->order,
                'isAdmin' => $this->isAdmin,
            ],
        );
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GiftCreated extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        protected string $giftName,
        protected float $giftPrice,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouveau cadeau ajouté',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.gifts.created',
            with: [
                'giftName'  => $this->giftName,
                'giftPrice' => $this->giftPrice,
            ],
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromPath(public_path('images/gift.jpg'))
                ->as('cadeau.jpg')
                ->withMime('image/jpeg'),
        ];
    }
}

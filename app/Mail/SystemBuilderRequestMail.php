<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Part\DataPart;

class SystemBuilderRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public const LOGO_CONTENT_ID = 'tepenet-system-builder-logo@tepenetguvenlik.com';

    /**
     * Create a new message instance.
     */
    public function __construct(
        public string $location,
        public bool $hasRisk,
        public ?int $riskCount,
        public string $systemType,
        public string $firstName,
        public string $lastName,
        public string $phone,
        public ?string $email,
        public string $city,
        public ?string $customerNote,
        public bool $campaignConsent,
    ) {
        $this->withSymfonyMessage(function (Email $message): void {
            $message->addPart(
                DataPart::fromPath(public_path('logo.png'), 'tepenet-logo.png', 'image/png')
                    ->asInline()
                    ->setContentId(self::LOGO_CONTENT_ID),
            );
        });
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: $this->email === null
                ? []
                : [new Address($this->email, $this->firstName.' '.$this->lastName)],
            subject: 'Yeni Kendi Sistemini Oluştur Talebi',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.system-builder-request',
            text: 'mail.system-builder-request-text',
            with: [
                'cityLabel' => $this->cityLabel(),
                'recommendedComponents' => $this->recommendedComponents(),
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    private function cityLabel(): string
    {
        return match ($this->city) {
            'bursa' => 'Bursa',
            'istanbul' => 'İstanbul',
            'ankara' => 'Ankara',
        };
    }

    /**
     * @return array<int, array{name: string, quantity: int}>
     */
    private function recommendedComponents(): array
    {
        return [
            ['name' => 'Alarm paneli', 'quantity' => 1],
            ['name' => 'Tuş takımı', 'quantity' => 1],
            ['name' => 'Manyetik kontak', 'quantity' => 1 + ($this->riskCount ?? 0)],
            ['name' => 'Dahili siren', 'quantity' => 1],
            ['name' => 'Harici siren', 'quantity' => 1],
            ['name' => 'Hareket dedektörü', 'quantity' => 1],
        ];
    }
}

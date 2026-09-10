<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Part\DataPart;

class DiscoveryRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public const LOGO_CONTENT_ID = 'tepenet-logo@tepenetguvenlik.com';

    public function __construct(
        public string $firstName,
        public string $lastName,
        public string $phone,
        public ?string $email,
        public string $productGroup,
        public string $city,
        public bool $isWorkplace,
        public ?int $branchCount,
        public bool $campaignConsent,
        public ?string $companyName = null,
        public ?string $organizationType = null,
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
            subject: $this->companyName === null
                ? 'Yeni Ücretsiz Keşif Talebi'
                : 'Yeni Kurumsal Ücretsiz Keşif Talebi',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.discovery-request',
            text: 'mail.discovery-request-text',
            with: [
                'productGroupLabel' => $this->productGroupLabel(),
                'cityLabel' => $this->cityLabel(),
                'organizationTypeLabel' => $this->organizationTypeLabel(),
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

    private function productGroupLabel(): string
    {
        return match ($this->productGroup) {
            'kamera' => 'Kamera Sistemleri',
            'alarm' => 'Alarm Sistemleri',
            'diger' => 'Diğer',
        };
    }

    private function cityLabel(): string
    {
        return Config::array('iller')[$this->city] ?? $this->city;
    }

    private function organizationTypeLabel(): ?string
    {
        return match ($this->organizationType) {
            'magaza' => 'Mağaza / Perakende',
            'ofis' => 'Ofis',
            'fabrika' => 'Fabrika / Üretim',
            'otel' => 'Otel / Konaklama',
            'diger' => 'Diğer',
            default => $this->organizationType,
        };
    }
}

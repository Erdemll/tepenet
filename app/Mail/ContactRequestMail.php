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

class ContactRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public const LOGO_CONTENT_ID = 'tepenet-contact-logo@tepenetguvenlik.com';

    /**
     * Create a new message instance.
     */
    public function __construct(
        public string $firstName,
        public string $lastName,
        public string $email,
        public string $phone,
        public ?string $city,
        public ?string $district,
        public ?string $topic,
        public ?string $customerMessage,
        public bool $campaignConsent,
        public bool $allowPhone,
        public bool $allowEmail,
        public bool $allowSms,
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
            replyTo: [new Address($this->email, $this->firstName.' '.$this->lastName)],
            subject: 'Yeni İletişim Formu Mesajı',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.contact-request',
            text: 'mail.contact-request-text',
            with: [
                'cityLabel' => $this->cityLabel(),
                'topicLabel' => $this->topicLabel(),
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
        if ($this->city === null) {
            return 'Belirtilmedi';
        }

        return Config::array('iller')[$this->city] ?? $this->city;
    }

    private function topicLabel(): string
    {
        return match ($this->topic) {
            'bilgi' => 'Bilgi',
            'memnuniyet' => 'Memnuniyet',
            'oneri' => 'Öneri',
            'sikayet' => 'Şikâyet',
            'talep' => 'Talep',
            'yetkili-servis' => 'Yetkili Servis',
            'yetkili-satici' => 'Yetkili Satıcı',
            default => 'Belirtilmedi',
        };
    }
}

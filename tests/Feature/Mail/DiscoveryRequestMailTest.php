<?php

use App\Mail\DiscoveryRequestMail;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Email;

it('renders discovery details and configures the reply address', function () {
    $mailable = new DiscoveryRequestMail(
        firstName: 'Ayşe',
        lastName: 'Yılmaz',
        phone: '0532 123 45 67',
        email: 'ayse@example.com',
        productGroup: 'kamera',
        city: 'bursa',
        isWorkplace: true,
        branchCount: 3,
        campaignConsent: true,
    );

    $mailable->assertHasSubject('Yeni Ücretsiz Keşif Talebi');
    $mailable->assertHasReplyTo('ayse@example.com');
    $mailable->assertSeeInHtml('Ayşe Yılmaz');
    $mailable->assertSeeInHtml('0532 123 45 67');
    $mailable->assertSeeInHtml('Kamera Sistemleri');
    $mailable->assertSeeInHtml('Bursa');
    $mailable->assertSeeInHtml('İş yeri');
    $mailable->assertSeeInHtml('3');
    $mailable->assertSeeInText('TEPENET GÜVENLİK');
    $mailable->assertSeeInText('ayse@example.com');
    $mailable->assertDontSeeInText('Laravel');

    $html = $mailable->render();

    expect($html)
        ->toContain('data-template="tepenet-discovery"')
        ->toContain('Ücretsiz keşif talebi alındı')
        ->toContain('alt="Tepenet Güvenlik"')
        ->toContain('src="cid:'.DiscoveryRequestMail::LOGO_CONTENT_ID.'"')
        ->not->toContain('laravel.com');

    $sentMessage = Mail::mailer('array')
        ->to('info@example.com')
        ->send($mailable);
    $email = $sentMessage?->getOriginalMessage();

    expect($email)->toBeInstanceOf(Email::class);
    expect($email->getAttachments())->toHaveCount(1);
    expect($email->getAttachments()[0]->getDisposition())->toBe('inline');
    expect($email->getAttachments()[0]->getContentId())->toBe(DiscoveryRequestMail::LOGO_CONTENT_ID);
    expect($email->getAttachments()[0]->getFilename())->toBe('tepenet-logo.png');
});

it('escapes user-provided content in the discovery email', function () {
    $mailable = new DiscoveryRequestMail(
        firstName: '<script>alert("ad")</script>',
        lastName: '<img src=x onerror=alert("soyad")>',
        phone: '<svg onload=alert("telefon")>',
        email: null,
        productGroup: 'alarm',
        city: 'ankara',
        isWorkplace: false,
        branchCount: null,
        campaignConsent: false,
    );

    $html = $mailable->render();

    expect($html)
        ->not->toContain('<script>alert("ad")</script>')
        ->not->toContain('<img src=x onerror=alert("soyad")>')
        ->not->toContain('<svg onload=alert("telefon")>');
});

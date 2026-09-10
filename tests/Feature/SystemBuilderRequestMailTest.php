<?php

use App\Mail\SystemBuilderRequestMail;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Email;

it('renders all system details, recommendations and contact information', function () {
    $mailable = new SystemBuilderRequestMail(
        location: 'İş Yeri',
        hasRisk: true,
        riskCount: 3,
        systemType: 'Kablosuz',
        firstName: 'Ayşe',
        lastName: 'Yılmaz',
        phone: '0532 123 45 67',
        email: 'ayse@example.com',
        city: 'bursa',
        customerNote: 'Arka kapı için ayrıca kamera değerlendirmesi rica ederim.',
        campaignConsent: true,
    );

    $mailable->assertHasSubject('Yeni Kendi Sistemini Oluştur Talebi');
    $mailable->assertHasReplyTo('ayse@example.com');
    $mailable->assertSeeInHtml('İş Yeri');
    $mailable->assertSeeInHtml('Kablosuz');
    $mailable->assertSeeInHtml('Riskli Kapı / Pencere');
    $mailable->assertSeeInHtml('Manyetik kontak');
    $mailable->assertSeeInHtml('Ayşe Yılmaz');
    $mailable->assertSeeInHtml('0532 123 45 67');
    $mailable->assertSeeInHtml('Bursa');
    $mailable->assertSeeInHtml('Arka kapı için ayrıca kamera değerlendirmesi rica ederim.');
    $mailable->assertSeeInText('ÖNERİLEN BAŞLANGIÇ PAKETİ');
    $mailable->assertSeeInText('Manyetik kontak: 4 adet');
    $mailable->assertDontSeeInText('Laravel');

    $html = $mailable->render();

    expect($html)
        ->toContain('data-template="tepenet-system-builder"')
        ->toContain('Yeni güvenlik sistemi talebi alındı')
        ->toContain('alt="Tepenet Güvenlik"')
        ->toContain('src="cid:'.SystemBuilderRequestMail::LOGO_CONTENT_ID.'"')
        ->not->toContain('laravel.com');

    $sentMessage = Mail::mailer('array')
        ->to('info@example.com')
        ->send($mailable);
    $email = $sentMessage?->getOriginalMessage();

    expect($email)->toBeInstanceOf(Email::class);
    expect($email->getAttachments())->toHaveCount(1);
    expect($email->getAttachments()[0]->getDisposition())->toBe('inline');
    expect($email->getAttachments()[0]->getContentId())->toBe(SystemBuilderRequestMail::LOGO_CONTENT_ID);
    expect($email->getAttachments()[0]->getFilename())->toBe('tepenet-logo.png');
});

it('renders the no-risk variant without an optional note or reply address', function () {
    $mailable = new SystemBuilderRequestMail(
        location: 'Ev',
        hasRisk: false,
        riskCount: null,
        systemType: 'Kablolu',
        firstName: 'Ali',
        lastName: 'Kaya',
        phone: '0532 000 00 00',
        email: null,
        city: 'ankara',
        customerNote: null,
        campaignConsent: false,
    );

    $mailable->assertSeeInHtml('Bulunmuyor');
    $mailable->assertSeeInHtml('Belirtilmedi');
    $mailable->assertSeeInText('Manyetik kontak: 1 adet');
    $mailable->assertDontSeeInHtml('Müşteri notu');
});

it('escapes user-provided content in the system builder email', function () {
    $mailable = new SystemBuilderRequestMail(
        location: 'Ev',
        hasRisk: false,
        riskCount: null,
        systemType: 'Kablolu',
        firstName: '<script>alert("ad")</script>',
        lastName: '<img src=x onerror=alert("soyad")>',
        phone: '<svg onload=alert("telefon")>',
        email: null,
        city: 'istanbul',
        customerNote: '<script>alert("not")</script>',
        campaignConsent: false,
    );

    $html = $mailable->render();

    expect($html)
        ->not->toContain('<script>alert("ad")</script>')
        ->not->toContain('<img src=x onerror=alert("soyad")>')
        ->not->toContain('<svg onload=alert("telefon")>')
        ->not->toContain('<script>alert("not")</script>');
});

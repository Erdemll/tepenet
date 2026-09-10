<?php

use App\Mail\ContactRequestMail;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Email;

it('renders all contact details and configures the reply address', function () {
    $mailable = new ContactRequestMail(
        firstName: 'Ayşe',
        lastName: 'Yılmaz',
        email: 'ayse@example.com',
        phone: '5321234567',
        city: 'bursa',
        district: 'inegöl',
        topic: 'talep',
        customerMessage: 'Alarm sistemleri hakkında ayrıntılı bilgi almak istiyorum.',
        campaignConsent: true,
        allowPhone: true,
        allowEmail: true,
        allowSms: false,
    );

    $mailable->assertHasSubject('Yeni İletişim Formu Mesajı');
    $mailable->assertHasReplyTo('ayse@example.com');
    $mailable->assertSeeInHtml('Ayşe Yılmaz');
    $mailable->assertSeeInHtml('+90 5321234567');
    $mailable->assertSeeInHtml('Bursa');
    $mailable->assertSeeInHtml('inegöl');
    $mailable->assertSeeInHtml('Talep');
    $mailable->assertSeeInHtml('Alarm sistemleri hakkında ayrıntılı bilgi almak istiyorum.');
    $mailable->assertSeeInText('TEPENET GÜVENLİK');
    $mailable->assertSeeInText('Telefon İzni: Evet');
    $mailable->assertSeeInText('SMS İzni: Hayır');
    $mailable->assertDontSeeInText('Laravel');

    $html = $mailable->render();

    expect($html)
        ->toContain('data-template="tepenet-contact"')
        ->toContain('İletişim formu mesajı alındı')
        ->toContain('alt="Tepenet Güvenlik"')
        ->toContain('src="cid:'.ContactRequestMail::LOGO_CONTENT_ID.'"')
        ->not->toContain('laravel.com');

    $sentMessage = Mail::mailer('array')
        ->to('info@example.com')
        ->send($mailable);
    $email = $sentMessage?->getOriginalMessage();

    expect($email)->toBeInstanceOf(Email::class);
    expect($email->getAttachments())->toHaveCount(1);
    expect($email->getAttachments()[0]->getDisposition())->toBe('inline');
    expect($email->getAttachments()[0]->getContentId())->toBe(ContactRequestMail::LOGO_CONTENT_ID);
    expect($email->getAttachments()[0]->getFilename())->toBe('tepenet-logo.png');
});

it('renders optional contact details as unspecified without campaign preferences', function () {
    $mailable = new ContactRequestMail(
        firstName: 'Ali',
        lastName: 'Kaya',
        email: 'ali@example.com',
        phone: '5320000000',
        city: null,
        district: null,
        topic: null,
        customerMessage: null,
        campaignConsent: false,
        allowPhone: false,
        allowEmail: false,
        allowSms: false,
    );

    $mailable->assertSeeInHtml('Belirtilmedi');
    $mailable->assertSeeInText('Kampanya İletişim İzni: Hayır');
    $mailable->assertDontSeeInHtml('Telefon İzni');
    $mailable->assertDontSeeInText('SMS İzni');
});

it('escapes every free-text value in the contact email', function () {
    $mailable = new ContactRequestMail(
        firstName: '<script>alert("ad")</script>',
        lastName: '<img src=x onerror=alert("soyad")>',
        email: 'guvenli@example.com',
        phone: '5321234567',
        city: 'bursa',
        district: '<svg onload=alert("ilce")>',
        topic: 'talep',
        customerMessage: '<script>alert("mesaj")</script>',
        campaignConsent: false,
        allowPhone: false,
        allowEmail: false,
        allowSms: false,
    );

    $html = $mailable->render();

    expect($html)
        ->not->toContain('<script>alert("ad")</script>')
        ->not->toContain('<img src=x onerror=alert("soyad")>')
        ->not->toContain('<svg onload=alert("ilce")>')
        ->not->toContain('<script>alert("mesaj")</script>');
});

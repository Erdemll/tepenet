<?php

use App\Mail\ContactRequestMail;
use Illuminate\Support\Facades\Exceptions;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportException;

function validContactRequestPayload(array $overrides = []): array
{
    return array_replace([
        'ad' => 'Ayşe',
        'soyad' => 'Yılmaz',
        'email' => 'ayse@example.com',
        'telefon' => '5321234567',
        'il' => 'bursa',
        'ilce' => 'inegöl',
        'konu' => 'talep',
        'mesaj' => 'Alarm sistemleri hakkında ayrıntılı bilgi almak istiyorum.',
        'kampanya_izni' => '1',
        'tercih_telefon' => '1',
        'tercih_email' => '1',
        'tercih_sms' => '0',
        'kvkk_onayi' => '1',
    ], $overrides);
}

it('sends every contact form field to the configured recipient', function () {
    config()->set('mail.contact.to', 'info@tepenetguvenlik.com');
    Mail::fake();

    $response = $this->post(route('iletisim.store'), validContactRequestPayload());

    $response
        ->assertRedirect(route('iletisim').'#iletisim-formu')
        ->assertSessionHas(
            'contact_success',
            'Mesajınız alındı. Ekibimiz en kısa sürede sizinle iletişime geçecek.',
        );
    Mail::assertSent(ContactRequestMail::class, function (ContactRequestMail $mail): bool {
        return $mail->hasTo('info@tepenetguvenlik.com')
            && $mail->firstName === 'Ayşe'
            && $mail->lastName === 'Yılmaz'
            && $mail->email === 'ayse@example.com'
            && $mail->phone === '5321234567'
            && $mail->city === 'bursa'
            && $mail->district === 'inegöl'
            && $mail->topic === 'talep'
            && $mail->customerMessage === 'Alarm sistemleri hakkında ayrıntılı bilgi almak istiyorum.'
            && $mail->campaignConsent
            && $mail->allowPhone
            && $mail->allowEmail
            && ! $mail->allowSms;
    });
});

it('normalizes unchecked campaign preferences before sending', function () {
    Mail::fake();
    $payload = validContactRequestPayload([
        'kampanya_izni' => '0',
        'tercih_telefon' => '1',
        'tercih_email' => '1',
        'tercih_sms' => '1',
    ]);

    $response = $this->post(route('iletisim.store'), $payload);

    $response->assertRedirect(route('iletisim').'#iletisim-formu');
    Mail::assertSent(ContactRequestMail::class, function (ContactRequestMail $mail): bool {
        return ! $mail->campaignConsent
            && ! $mail->allowPhone
            && ! $mail->allowEmail
            && ! $mail->allowSms;
    });
});

it('excludes a district submitted without a city', function () {
    Mail::fake();
    $payload = validContactRequestPayload([
        'il' => '',
        'ilce' => 'istemci-tarafindan-eklendi',
    ]);

    $response = $this->post(route('iletisim.store'), $payload);

    $response->assertRedirect(route('iletisim').'#iletisim-formu');
    Mail::assertSent(ContactRequestMail::class, function (ContactRequestMail $mail): bool {
        return $mail->city === null && $mail->district === null;
    });
});

it('rejects an empty contact request without sending mail', function () {
    Mail::fake();

    $response = $this->from(route('iletisim'))->post(route('iletisim.store'));

    $response
        ->assertRedirect(route('iletisim'))
        ->assertSessionHasErrors([
            'ad' => 'Lütfen adınızı girin.',
            'soyad' => 'Lütfen soyadınızı girin.',
            'email' => 'Lütfen e-posta adresinizi girin.',
            'telefon' => 'Lütfen telefon numaranızı girin.',
            'kvkk_onayi' => 'Devam etmek için aydınlatma metnini onaylayın.',
        ]);
    Mail::assertNothingOutgoing();
});

it('rejects invalid contact form values without sending mail', function (
    string $field,
    mixed $value,
    string $message,
) {
    Mail::fake();

    $response = $this
        ->from(route('iletisim'))
        ->post(route('iletisim.store'), validContactRequestPayload([$field => $value]));

    $response
        ->assertRedirect(route('iletisim'))
        ->assertSessionHasErrors([$field => $message]);
    Mail::assertNothingOutgoing();
})->with([
    'long first name' => ['ad', str_repeat('a', 101), 'Ad en fazla 100 karakter olabilir.'],
    'long last name' => ['soyad', str_repeat('a', 101), 'Soyad en fazla 100 karakter olabilir.'],
    'invalid email' => ['email', 'gecersiz-adres', 'Lütfen geçerli bir e-posta adresi girin.'],
    'invalid phone' => ['telefon', '05321234567', 'Telefon numarası 5 ile başlayan 10 haneden oluşmalıdır.'],
    'unknown city' => ['il', 'yurt-disi', 'Lütfen geçerli bir il seçin.'],
    'long district' => ['ilce', str_repeat('a', 101), 'İlçe en fazla 100 karakter olabilir.'],
    'unknown topic' => ['konu', 'bilinmeyen', 'Lütfen geçerli bir konu seçin.'],
    'long message' => ['mesaj', str_repeat('a', 5001), 'Mesaj en fazla 5.000 karakter olabilir.'],
    'declined privacy notice' => ['kvkk_onayi', '0', 'Devam etmek için aydınlatma metnini onaylayın.'],
]);

it('reports delivery failures and returns a safe message to the contact form', function () {
    config()->set('mail.contact.to', 'info@tepenetguvenlik.com');
    Exceptions::fake();
    Mail::shouldReceive('to')
        ->once()
        ->with('info@tepenetguvenlik.com')
        ->andThrow(new TransportException('Resend ulaşılamadı.'));

    $response = $this->post(route('iletisim.store'), validContactRequestPayload());

    $response
        ->assertRedirect(route('iletisim').'#iletisim-formu')
        ->assertSessionHas('contact_error', 'Mesajınız şu anda gönderilemedi. Lütfen daha sonra tekrar deneyin.')
        ->assertSessionHasInput('ad', 'Ayşe')
        ->assertSessionHas(
            '_old_input',
            fn (array $oldInput): bool => ! array_key_exists('kvkk_onayi', $oldInput),
        );
    Exceptions::assertReported(TransportException::class);
});

it('limits contact requests to three submissions per minute', function () {
    Mail::fake();

    foreach (range(1, 3) as $attempt) {
        $this->post(route('iletisim.store'), validContactRequestPayload([
            'email' => "ayse{$attempt}@example.com",
        ]))->assertRedirect(route('iletisim').'#iletisim-formu');
    }

    $this->post(route('iletisim.store'), validContactRequestPayload())
        ->assertTooManyRequests();
    Mail::assertSentTimes(ContactRequestMail::class, 3);
});

<?php

use App\Mail\SystemBuilderRequestMail;
use Illuminate\Support\Facades\Exceptions;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportException;

function validSystemBuilderRequestPayload(array $overrides = []): array
{
    return array_replace([
        'talep_alani' => 'İş Yeri',
        'risk_durumu' => 'Evet',
        'riskli_nokta_sayisi' => '3',
        'sistem_tercihi' => 'Kablosuz',
        'ad' => 'Ayşe',
        'soyad' => 'Yılmaz',
        'telefon' => '0532 123 45 67',
        'email' => 'ayse@example.com',
        'il' => 'bursa',
        'not' => 'Arka kapı için ayrıca kamera değerlendirmesi rica ederim.',
        'kampanya_izni' => '1',
        'kvkk_onayi' => '1',
    ], $overrides);
}

it('renders the system builder form with its post endpoint and csrf protection', function () {
    $this->get(route('kendi-sistemini-olustur.index'))
        ->assertOk()
        ->assertSee('action="'.route('kendi-sistemini-olustur.store').'"', false)
        ->assertSee('name="_token"', false)
        ->assertSee('name="talep_alani"', false)
        ->assertSee('name="kvkk_onayi"', false);
});

it('sends all system builder details to the configured recipient', function () {
    config()->set('mail.system_builder.to', 'info@tepenetguvenlik.com');
    Mail::fake();

    $response = $this->post(
        route('kendi-sistemini-olustur.store'),
        validSystemBuilderRequestPayload(),
    );

    $response
        ->assertRedirect(route('kendi-sistemini-olustur.index').'#sistem-olusturucu')
        ->assertSessionHas(
            'system_builder_success',
            'Talebiniz alındı. Ekibimiz en kısa sürede sizinle iletişime geçecek.',
        );

    Mail::assertSent(SystemBuilderRequestMail::class, function (SystemBuilderRequestMail $mail): bool {
        return $mail->hasTo('info@tepenetguvenlik.com')
            && $mail->location === 'İş Yeri'
            && $mail->hasRisk
            && $mail->riskCount === 3
            && $mail->systemType === 'Kablosuz'
            && $mail->firstName === 'Ayşe'
            && $mail->lastName === 'Yılmaz'
            && $mail->phone === '0532 123 45 67'
            && $mail->email === 'ayse@example.com'
            && $mail->city === 'bursa'
            && $mail->customerNote === 'Arka kapı için ayrıca kamera değerlendirmesi rica ederim.'
            && $mail->campaignConsent;
    });
});

it('rejects an empty system builder request without sending mail', function () {
    Mail::fake();

    $response = $this
        ->from(route('kendi-sistemini-olustur.index'))
        ->post(route('kendi-sistemini-olustur.store'));

    $response
        ->assertRedirect(route('kendi-sistemini-olustur.index'))
        ->assertSessionHasErrors([
            'talep_alani' => 'Lütfen kullanım alanını seçin.',
            'risk_durumu' => 'Lütfen riskli nokta durumunu seçin.',
            'sistem_tercihi' => 'Lütfen sistem tercihinizi seçin.',
            'ad' => 'Lütfen adınızı girin.',
            'soyad' => 'Lütfen soyadınızı girin.',
            'telefon' => 'Lütfen telefon numaranızı girin.',
            'il' => 'Lütfen bir il seçin.',
            'kvkk_onayi' => 'Devam etmek için aydınlatma metnini onaylayın.',
        ]);
    Mail::assertNothingOutgoing();
});

it('rejects invalid system builder values without sending mail', function (
    string $field,
    mixed $value,
    string $message,
) {
    Mail::fake();

    $response = $this
        ->from(route('kendi-sistemini-olustur.index'))
        ->post(
            route('kendi-sistemini-olustur.store'),
            validSystemBuilderRequestPayload([$field => $value]),
        );

    $response
        ->assertRedirect(route('kendi-sistemini-olustur.index'))
        ->assertSessionHasErrors([$field => $message]);
    Mail::assertNothingOutgoing();
})->with([
    'unknown location' => ['talep_alani', 'Depo', 'Lütfen geçerli bir kullanım alanı seçin.'],
    'unknown risk state' => ['risk_durumu', 'Belki', 'Lütfen geçerli bir risk durumu seçin.'],
    'unknown system type' => ['sistem_tercihi', 'Hibrit', 'Lütfen geçerli bir sistem tercihi seçin.'],
    'invalid phone' => ['telefon', 'telefon-degil', 'Lütfen geçerli bir telefon numarası girin.'],
    'invalid email' => ['email', 'gecersiz-adres', 'Lütfen geçerli bir e-posta adresi girin.'],
    'unknown city' => ['il', 'izmir', 'Lütfen geçerli bir il seçin.'],
    'long customer note' => ['not', str_repeat('n', 2001), 'Not en fazla 2.000 karakter olabilir.'],
    'declined privacy notice' => ['kvkk_onayi', '0', 'Devam etmek için aydınlatma metnini onaylayın.'],
]);

it('requires a valid risk count when an additional risk point exists', function (
    mixed $riskCount,
    string $message,
) {
    Mail::fake();
    $payload = validSystemBuilderRequestPayload();

    if ($riskCount === null) {
        unset($payload['riskli_nokta_sayisi']);
    } else {
        $payload['riskli_nokta_sayisi'] = $riskCount;
    }

    $this
        ->from(route('kendi-sistemini-olustur.index'))
        ->post(route('kendi-sistemini-olustur.store'), $payload)
        ->assertSessionHasErrors(['riskli_nokta_sayisi' => $message]);
    Mail::assertNothingOutgoing();
})->with([
    'missing count' => [null, 'Risk bulunan alanlar için kapı ve pencere sayısını girin.'],
    'non-integer count' => ['üç', 'Kapı ve pencere sayısı tam sayı olmalıdır.'],
    'count below one' => ['0', 'Kapı ve pencere sayısı en az 1 olmalıdır.'],
    'count above limit' => ['51', 'Kapı ve pencere sayısı en fazla 50 olabilir.'],
]);

it('excludes the risk count and normalizes unchecked consent for requests without risk', function () {
    Mail::fake();

    $payload = validSystemBuilderRequestPayload([
        'risk_durumu' => 'Hayır',
        'riskli_nokta_sayisi' => '50',
    ]);
    unset($payload['kampanya_izni']);

    $this->post(route('kendi-sistemini-olustur.store'), $payload)
        ->assertRedirect(route('kendi-sistemini-olustur.index').'#sistem-olusturucu');

    Mail::assertSent(SystemBuilderRequestMail::class, function (SystemBuilderRequestMail $mail): bool {
        return ! $mail->hasRisk
            && $mail->riskCount === null
            && ! $mail->campaignConsent;
    });
});

it('reports delivery failures and returns a safe message with previous input', function () {
    config()->set('mail.system_builder.to', 'info@tepenetguvenlik.com');
    Exceptions::fake();
    Mail::shouldReceive('to')
        ->once()
        ->with('info@tepenetguvenlik.com')
        ->andThrow(new TransportException('Resend ulaşılamadı.'));

    $response = $this->post(
        route('kendi-sistemini-olustur.store'),
        validSystemBuilderRequestPayload(),
    );

    $response
        ->assertRedirect(route('kendi-sistemini-olustur.index').'#sistem-olusturucu')
        ->assertSessionHas('system_builder_error', 'Talebiniz şu anda gönderilemedi. Lütfen daha sonra tekrar deneyin.')
        ->assertSessionHasInput('talep_alani', 'İş Yeri')
        ->assertSessionHasInput('not', 'Arka kapı için ayrıca kamera değerlendirmesi rica ederim.')
        ->assertSessionHas(
            '_old_input',
            fn (array $oldInput): bool => ! array_key_exists('kvkk_onayi', $oldInput),
        );
    Exceptions::assertReported(TransportException::class);
});

it('limits system builder requests to three submissions per minute', function () {
    Mail::fake();

    foreach (range(1, 3) as $attempt) {
        $this->post(route('kendi-sistemini-olustur.store'), validSystemBuilderRequestPayload([
            'email' => "ayse{$attempt}@example.com",
        ]))->assertRedirect(route('kendi-sistemini-olustur.index').'#sistem-olusturucu');
    }

    $this->post(route('kendi-sistemini-olustur.store'), validSystemBuilderRequestPayload())
        ->assertTooManyRequests();
    Mail::assertSentTimes(SystemBuilderRequestMail::class, 3);
});

<?php

use App\Mail\DiscoveryRequestMail;
use Illuminate\Support\Facades\Exceptions;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportException;

it('sends a sample discovery email to the configured test recipient', function () {
    config()->set('mail.discovery.test_to', 'rdmlale@gmail.com');
    Mail::fake();

    $this->artisan('mail:test-discovery')
        ->expectsOutput('Test keşif e-postası rdmlale@gmail.com adresine gönderildi.')
        ->assertSuccessful();

    Mail::assertSent(DiscoveryRequestMail::class, function (DiscoveryRequestMail $mail): bool {
        return $mail->hasTo('rdmlale@gmail.com')
            && $mail->firstName === 'Test'
            && $mail->lastName === 'Kullanıcısı';
    });
});

it('fails without attempting delivery when the test recipient is missing', function () {
    config()->set('mail.discovery.test_to', '');
    Mail::fake();

    $this->artisan('mail:test-discovery')
        ->expectsOutput('Test e-posta alıcısı yapılandırılmamış.')
        ->assertFailed();

    Mail::assertNothingOutgoing();
});

it('reports transport failures with a concise command error', function () {
    config()->set('mail.discovery.test_to', 'rdmlale@gmail.com');
    Exceptions::fake();
    Mail::shouldReceive('to')
        ->once()
        ->with('rdmlale@gmail.com')
        ->andThrow(new TransportException('Resend ulaşılamadı.'));

    $this->artisan('mail:test-discovery')
        ->expectsOutput('Test e-postası gönderilemedi: Resend ulaşılamadı.')
        ->assertFailed();

    Exceptions::assertReported(TransportException::class);
});

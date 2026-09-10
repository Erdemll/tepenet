<?php

use App\Mail\SystemBuilderRequestMail;
use Illuminate\Support\Facades\Exceptions;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportException;

it('sends a sample system builder email to the configured test recipient', function () {
    config()->set('mail.system_builder.test_to', 'rdmlale@gmail.com');
    Mail::fake();

    $this->artisan('mail:test-system-builder')
        ->expectsOutput('Sistem oluşturucu test e-postası rdmlale@gmail.com adresine gönderildi.')
        ->assertSuccessful();

    Mail::assertSent(SystemBuilderRequestMail::class, function (SystemBuilderRequestMail $mail): bool {
        return $mail->hasTo('rdmlale@gmail.com')
            && $mail->firstName === 'Test'
            && $mail->lastName === 'Kullanıcısı'
            && $mail->location === 'İş Yeri'
            && $mail->hasRisk
            && $mail->riskCount === 3;
    });
});

it('fails without attempting delivery when the system builder test recipient is missing', function () {
    config()->set('mail.system_builder.test_to', '');
    Mail::fake();

    $this->artisan('mail:test-system-builder')
        ->expectsOutput('Sistem oluşturucu test e-posta alıcısı yapılandırılmamış.')
        ->assertFailed();

    Mail::assertNothingOutgoing();
});

it('reports transport failures from the system builder test command', function () {
    config()->set('mail.system_builder.test_to', 'rdmlale@gmail.com');
    Exceptions::fake();
    Mail::shouldReceive('to')
        ->once()
        ->with('rdmlale@gmail.com')
        ->andThrow(new TransportException('Resend ulaşılamadı.'));

    $this->artisan('mail:test-system-builder')
        ->expectsOutput('Sistem oluşturucu test e-postası gönderilemedi: Resend ulaşılamadı.')
        ->assertFailed();

    Exceptions::assertReported(TransportException::class);
});

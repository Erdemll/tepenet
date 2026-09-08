<?php

namespace App\Console\Commands;

use App\Mail\DiscoveryRequestMail;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

#[Signature('mail:test-discovery')]
#[Description('Resend yapılandırmasını örnek bir ücretsiz keşif e-postasıyla test eder')]
class SendDiscoveryTestMail extends Command
{
    public function handle(): int
    {
        $recipient = config('mail.discovery.test_to');

        if (! is_string($recipient) || $recipient === '') {
            $this->error('Test e-posta alıcısı yapılandırılmamış.');

            return self::FAILURE;
        }

        try {
            Mail::to($recipient)->send(new DiscoveryRequestMail(
                firstName: 'Test',
                lastName: 'Kullanıcısı',
                phone: '0555 555 55 55',
                email: 'test@example.com',
                productGroup: 'alarm',
                city: 'istanbul',
                isWorkplace: true,
                branchCount: 2,
                campaignConsent: false,
            ));
        } catch (TransportExceptionInterface $exception) {
            report($exception);
            $this->error('Test e-postası gönderilemedi: '.$exception->getMessage());

            return self::FAILURE;
        }

        $this->info("Test keşif e-postası {$recipient} adresine gönderildi.");

        return self::SUCCESS;
    }
}

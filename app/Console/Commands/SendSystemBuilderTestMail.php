<?php

namespace App\Console\Commands;

use App\Mail\SystemBuilderRequestMail;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

#[Signature('mail:test-system-builder')]
#[Description('Resend yapılandırmasını örnek bir sistem oluşturma e-postasıyla test eder')]
class SendSystemBuilderTestMail extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $recipient = config('mail.system_builder.test_to');

        if (! is_string($recipient) || $recipient === '') {
            $this->error('Sistem oluşturucu test e-posta alıcısı yapılandırılmamış.');

            return self::FAILURE;
        }

        try {
            Mail::to($recipient)->send(new SystemBuilderRequestMail(
                location: 'İş Yeri',
                hasRisk: true,
                riskCount: 3,
                systemType: 'Kablosuz',
                firstName: 'Test',
                lastName: 'Kullanıcısı',
                phone: '0555 555 55 55',
                email: 'test@example.com',
                city: 'istanbul',
                customerNote: 'Bu ileti, sistem oluşturucu e-posta tasarımını kontrol etmek için gönderilmiştir.',
                campaignConsent: false,
            ));
        } catch (TransportExceptionInterface $exception) {
            report($exception);
            $this->error('Sistem oluşturucu test e-postası gönderilemedi: '.$exception->getMessage());

            return self::FAILURE;
        }

        $this->info("Sistem oluşturucu test e-postası {$recipient} adresine gönderildi.");

        return self::SUCCESS;
    }
}

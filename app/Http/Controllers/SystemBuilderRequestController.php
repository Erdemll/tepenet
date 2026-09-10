<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSystemBuilderRequest;
use App\Mail\SystemBuilderRequestMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class SystemBuilderRequestController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreSystemBuilderRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            Mail::to(config('mail.system_builder.to'))->send(new SystemBuilderRequestMail(
                location: $data['talep_alani'],
                hasRisk: $data['risk_durumu'] === 'Evet',
                riskCount: $data['riskli_nokta_sayisi'] ?? null,
                systemType: $data['sistem_tercihi'],
                firstName: $data['ad'],
                lastName: $data['soyad'],
                phone: $data['telefon'],
                email: $data['email'] ?? null,
                city: $data['il'],
                customerNote: $data['not'] ?? null,
                campaignConsent: $data['kampanya_izni'],
            ));
        } catch (TransportExceptionInterface $exception) {
            report($exception);

            return redirect()
                ->to(route('kendi-sistemini-olustur.index').'#sistem-olusturucu')
                ->withInput($request->safe()->except(['kvkk_onayi']))
                ->with('system_builder_error', 'Talebiniz şu anda gönderilemedi. Lütfen daha sonra tekrar deneyin.');
        }

        return redirect()
            ->to(route('kendi-sistemini-olustur.index').'#sistem-olusturucu')
            ->with('system_builder_success', 'Talebiniz alındı. Ekibimiz en kısa sürede sizinle iletişime geçecek.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiscoveryRequest;
use App\Mail\DiscoveryRequestMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class DiscoveryRequestController extends Controller
{
    public function __invoke(StoreDiscoveryRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            Mail::to(config('mail.discovery.to'))->send(new DiscoveryRequestMail(
                firstName: $data['ad'],
                lastName: $data['soyad'],
                phone: $data['telefon'],
                email: $data['email'] ?? null,
                productGroup: $data['urun_grubu'],
                city: $data['il'],
                isWorkplace: $data['isyeri_talebi'],
                branchCount: $data['sube_sayisi'] ?? null,
                campaignConsent: $data['kampanya_izni'],
            ));
        } catch (TransportExceptionInterface $exception) {
            report($exception);

            return redirect()
                ->to(route('home').'#ucretsiz-kesif')
                ->withInput($request->safe()->except(['kvkk_onayi']))
                ->with('discovery_error', 'Talebiniz şu anda gönderilemedi. Lütfen daha sonra tekrar deneyin.');
        }

        return redirect()
            ->to(route('home').'#ucretsiz-kesif')
            ->with('discovery_success', 'Talebiniz alındı. Ekibimiz en kısa sürede sizinle iletişime geçecek.');
    }
}

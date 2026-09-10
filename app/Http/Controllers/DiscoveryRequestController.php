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
        $returnUrl = $this->returnUrl($data['source_page'] ?? null);

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
                companyName: $data['firma_adi'] ?? null,
                organizationType: $data['kurum_turu'] ?? null,
            ));
        } catch (TransportExceptionInterface $exception) {
            report($exception);

            return redirect()
                ->to($returnUrl)
                ->withInput($request->safe()->except(['kvkk_onayi']))
                ->with('discovery_error', 'Talebiniz şu anda gönderilemedi. Lütfen daha sonra tekrar deneyin.');
        }

        return redirect()
            ->to($returnUrl)
            ->with('discovery_success', 'Talebiniz alındı. Ekibimiz en kısa sürede sizinle iletişime geçecek.');
    }

    private function returnUrl(?string $sourcePage): string
    {
        return match ($sourcePage) {
            'ev-guvenligi' => route('ev-guvenligi.index').'#ucretsiz-kesif-hero',
            'ev-guvenligi-nelerden-olusur' => route('ev-guvenligi.nelerden-olusur').'#ucretsiz-kesif',
            'is-yeri-guvenligi' => route('is-yeri-guvenligi.index').'#ucretsiz-kesif-hero',
            'is-yeri-guvenligi-nelerden-olusur' => route('is-yeri-guvenligi.nelerden-olusur').'#ucretsiz-kesif',
            'kurumsal-cozumler' => route('kurumsal-cozumler.index').'#ucretsiz-kesif',
            default => route('home').'#ucretsiz-kesif',
        };
    }
}

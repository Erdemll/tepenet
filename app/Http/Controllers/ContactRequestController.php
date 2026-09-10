<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactRequestMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class ContactRequestController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreContactRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            Mail::to(config('mail.contact.to'))->send(new ContactRequestMail(
                firstName: $data['ad'],
                lastName: $data['soyad'],
                email: $data['email'],
                phone: $data['telefon'],
                city: $data['il'] ?? null,
                district: $data['ilce'] ?? null,
                topic: $data['konu'] ?? null,
                customerMessage: $data['mesaj'] ?? null,
                campaignConsent: $data['kampanya_izni'],
                allowPhone: $data['tercih_telefon'] ?? false,
                allowEmail: $data['tercih_email'] ?? false,
                allowSms: $data['tercih_sms'] ?? false,
            ));
        } catch (TransportExceptionInterface $exception) {
            report($exception);

            return redirect()
                ->to(route('iletisim').'#iletisim-formu')
                ->withInput($request->safe()->except(['kvkk_onayi']))
                ->with('contact_error', 'Mesajınız şu anda gönderilemedi. Lütfen daha sonra tekrar deneyin.');
        }

        return redirect()
            ->to(route('iletisim').'#iletisim-formu')
            ->with('contact_success', 'Mesajınız alındı. Ekibimiz en kısa sürede sizinle iletişime geçecek.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Urun;
use App\Models\UrunKategori;
use Illuminate\Contracts\View\View;

class UrunController extends Controller
{
    public function show(string $sistem, UrunKategori $urunKategori, Urun $urun): View
    {
        abort_unless($urunKategori->sistemSlug() === $sistem, 404);

        $sistemBasligi = match ($sistem) {
            'alarm-sistemleri' => 'Alarm Sistemleri',
            'kamera-sistemleri' => 'Kamera Sistemleri',
        };

        return view('urun_detay', [
            'sistem' => $sistem,
            'sistemBasligi' => $sistemBasligi,
            'urunKategori' => $urunKategori,
            'urun' => $urun,
            'urunResimUrl' => $urun->resimUrl(),
        ]);
    }
}

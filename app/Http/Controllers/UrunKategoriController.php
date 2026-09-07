<?php

namespace App\Http\Controllers;

use App\Models\UrunKategori;
use Illuminate\Contracts\View\View;

class UrunKategoriController extends Controller
{
    public function show(string $sistem, UrunKategori $urunKategori): View
    {
        abort_unless($urunKategori->sistemSlug() === $sistem, 404);

        $urunler = $urunKategori->urunler()
            ->orderBy('baslik')
            ->paginate(12);

        $sistemBasligi = match ($sistem) {
            'alarm-sistemleri' => 'Alarm Sistemleri',
            'kamera-sistemleri' => 'Kamera Sistemleri',
        };

        return view('urunler', [
            'sistem' => $sistem,
            'sistemBasligi' => $sistemBasligi,
            'urunKategori' => $urunKategori,
            'urunler' => $urunler,
        ]);
    }
}

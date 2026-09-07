<?php

namespace App\Models;

use Database\Factories\UrunFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

#[Fillable([
    'baslik',
    'kategori_id',
    'aciklama',
    'urun_kodu',
    'resim_yolu',
    'slug',
])]
class Urun extends Model
{
    /** @use HasFactory<UrunFactory> */
    use HasFactory;

    protected $table = 'urunler';

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(UrunKategori::class, 'kategori_id');
    }

    public function resimUrl(): ?string
    {
        if ($this->resim_yolu === null) {
            return null;
        }

        return Storage::disk('public')->url($this->resim_yolu);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}

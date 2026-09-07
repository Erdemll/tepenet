<?php

namespace App\Models;

use Database\Factories\UrunKategoriFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['baslik', 'slug'])]
class UrunKategori extends Model
{
    /** @use HasFactory<UrunKategoriFactory> */
    use HasFactory;

    protected $table = 'urun_kategoriler';

    /**
     * @return array<string, array{baslik: string, sistem: string}>
     */
    public static function publicCatalog(): array
    {
        return [
            'kablolu-alarm-sistemi' => [
                'baslik' => 'Kablolu Alarm Sistemi',
                'sistem' => 'alarm-sistemleri',
            ],
            'kablosuz-alarm-sistemi' => [
                'baslik' => 'Kablosuz Alarm Sistemi',
                'sistem' => 'alarm-sistemleri',
            ],
            'hd-kamera-sistemleri' => [
                'baslik' => 'HD Güvenlik Kamerası Sistemleri',
                'sistem' => 'kamera-sistemleri',
            ],
            'ip-kamera-sistemleri' => [
                'baslik' => 'IP Kamera Sistemleri',
                'sistem' => 'kamera-sistemleri',
            ],
        ];
    }

    public function urunler(): HasMany
    {
        return $this->hasMany(Urun::class, 'kategori_id');
    }

    public function sistemSlug(): ?string
    {
        return self::publicCatalog()[$this->slug]['sistem'] ?? null;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function resolveChildRouteBinding(mixed $childType, mixed $value, mixed $field): ?Model
    {
        if ($childType === 'urun') {
            return $this->urunler()
                ->where($field ?? (new Urun)->getRouteKeyName(), $value)
                ->first();
        }

        return parent::resolveChildRouteBinding($childType, $value, $field);
    }
}

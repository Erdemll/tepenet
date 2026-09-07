<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('urun_kategoriler', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('baslik');
        });

        $bilinenSluglar = [
            'Kablolu Alarm Sistemi' => 'kablolu-alarm-sistemi',
            'Kablosuz Alarm Sistemi' => 'kablosuz-alarm-sistemi',
            'HD Güvenlik Kamerası Sistemleri' => 'hd-kamera-sistemleri',
            'IP Kamera Sistemleri' => 'ip-kamera-sistemleri',
        ];
        $kullanilanSluglar = [];

        DB::table('urun_kategoriler')
            ->select(['id', 'baslik'])
            ->orderBy('id')
            ->each(function (object $kategori) use ($bilinenSluglar, &$kullanilanSluglar): void {
                $temelSlug = $bilinenSluglar[$kategori->baslik] ?? Str::slug($kategori->baslik);
                $temelSlug = $temelSlug !== '' ? $temelSlug : "kategori-{$kategori->id}";
                $slug = $temelSlug;
                $sira = 2;

                while (in_array($slug, $kullanilanSluglar, true)) {
                    $slug = "{$temelSlug}-{$sira}";
                    $sira++;
                }

                DB::table('urun_kategoriler')
                    ->where('id', $kategori->id)
                    ->update(['slug' => $slug]);

                $kullanilanSluglar[] = $slug;
            });

        Schema::table('urun_kategoriler', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->change();
            $table->unique('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('urun_kategoriler', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};

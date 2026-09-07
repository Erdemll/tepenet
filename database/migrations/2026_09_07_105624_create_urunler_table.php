<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('urunler', function (Blueprint $table) {
            $table->id();
            $table->string('baslik');
            $table->foreignId('kategori_id')
                ->constrained('urun_kategoriler')
                ->restrictOnDelete();
            $table->text('aciklama');
            $table->string('urun_kodu')->unique();
            $table->string('resim_yolu')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('urunler');
    }
};

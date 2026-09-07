<?php

use App\Models\Urun;
use App\Models\UrunKategori;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(LazilyRefreshDatabase::class);

function validUrunPayload(UrunKategori $kategori, array $overrides = []): array
{
    return array_merge([
        'baslik' => 'Kablolu Alarm Paneli',
        'kategori_id' => $kategori->id,
        'aciklama' => 'Ev ve iş yerleri için profesyonel alarm paneli.',
        'urun_kodu' => 'tp-1001',
        'slug' => '',
        'resmi_sil' => '0',
    ], $overrides);
}

it('redirects guests and forbids non administrators', function () {
    $this->get(route('admin.urunler.index'))
        ->assertRedirectToRoute('admin.login');

    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('admin.urunler.index'))
        ->assertForbidden();
});

it('renders the searchable paginated product table for administrators', function () {
    $admin = User::factory()->admin()->create();
    $kategori = UrunKategori::factory()->create();
    Urun::factory()->count(12)->for($kategori, 'kategori')->create();

    $response = $this->actingAs($admin)
        ->get(route('admin.urunler.index'));

    $response
        ->assertOk()
        ->assertViewIs('admin.urunler.index')
        ->assertSee('Toplam 12 kaydın');
    expect($response->viewData('table')['paginator'])
        ->toHaveCount(10)
        ->total()->toBe(12);
});

it('searches products and rejects unsafe sort values', function () {
    $admin = User::factory()->admin()->create();
    $kategori = UrunKategori::factory()->create();
    Urun::factory()->for($kategori, 'kategori')->create([
        'baslik' => 'Zulu Panel',
        'urun_kodu' => 'TP-ZULU',
    ]);
    Urun::factory()->for($kategori, 'kategori')->create([
        'baslik' => 'Alfa Panel',
        'urun_kodu' => 'TP-ALFA',
    ]);

    $response = $this->actingAs($admin)->get(route('admin.urunler.index', [
        'search' => 'Panel',
        'sort' => 'baslik',
        'direction' => 'asc',
    ]));

    expect($response->viewData('table')['paginator']->pluck('baslik')->all())
        ->toBe(['Alfa Panel', 'Zulu Panel']);

    $unsafeResponse = $this->actingAs($admin)->get(route('admin.urunler.index', [
        'sort' => 'baslik; DROP TABLE users',
        'direction' => 'sideways',
    ]));

    expect($unsafeResponse->viewData('table'))
        ->sort->toBe('created_at')
        ->direction->toBe('desc');
});

it('renders create and edit forms with product categories', function () {
    $admin = User::factory()->admin()->create();
    $kategori = UrunKategori::factory()->create([
        'baslik' => 'Kablolu Alarm Sistemi',
    ]);
    $urun = Urun::factory()->for($kategori, 'kategori')->create();

    $this->actingAs($admin)
        ->get(route('admin.urunler.create'))
        ->assertOk()
        ->assertViewIs('admin.urunler.create')
        ->assertSee('Kablolu Alarm Sistemi');

    $this->actingAs($admin)
        ->get(route('admin.urunler.edit', $urun))
        ->assertOk()
        ->assertViewIs('admin.urunler.edit')
        ->assertSee($urun->baslik);
});

it('creates a product and stores its image on the public disk', function () {
    Storage::fake('public');
    $admin = User::factory()->admin()->create();
    $kategori = UrunKategori::factory()->create();

    $response = $this->actingAs($admin)->post(
        route('admin.urunler.store'),
        validUrunPayload($kategori, [
            'resim' => UploadedFile::fake()->image('alarm-paneli.jpg', 800, 800),
            'unexpected_attribute' => 'kaydedilmemeli',
        ]),
    );
    $urun = Urun::query()->where('slug', 'kablolu-alarm-paneli')->firstOrFail();

    $response
        ->assertRedirectToRoute('admin.urunler.index')
        ->assertSessionHas('status', 'Ürün başarıyla eklendi.');
    expect($urun)
        ->urun_kodu->toBe('TP-1001')
        ->kategori_id->toBe($kategori->id)
        ->and($urun->getAttributes())->not->toHaveKey('unexpected_attribute');
    Storage::disk('public')->assertExists($urun->resim_yolu);
});

it('rejects invalid product data and unsafe image files', function () {
    Storage::fake('public');
    $admin = User::factory()->admin()->create();
    $kategori = UrunKategori::factory()->create();
    Urun::factory()->for($kategori, 'kategori')->create([
        'urun_kodu' => 'TP-1001',
        'slug' => 'kablolu-alarm-paneli',
    ]);

    $response = $this->actingAs($admin)
        ->from(route('admin.urunler.create'))
        ->post(route('admin.urunler.store'), [
            'baslik' => '',
            'kategori_id' => 999999,
            'aciklama' => '',
            'urun_kodu' => 'TP-1001',
            'slug' => 'kablolu-alarm-paneli',
            'resim' => UploadedFile::fake()->create('urun.svg', 20, 'image/svg+xml'),
        ]);

    $response
        ->assertRedirectToRoute('admin.urunler.create')
        ->assertSessionHasErrors([
            'baslik' => 'Ürün başlığını girin.',
            'kategori_id' => 'Geçerli bir ürün kategorisi seçin.',
            'aciklama' => 'Ürün açıklamasını girin.',
            'urun_kodu' => 'Bu ürün kodu daha önce kullanılmış.',
            'slug' => 'Bu ürün bağlantısı daha önce kullanılmış.',
            'resim',
        ]);
    expect(Urun::query()->count())->toBe(1);
});

it('replaces the product image and deletes the old file', function () {
    Storage::fake('public');
    Storage::disk('public')->put('urunler/eski-resim.jpg', 'old-image');
    $admin = User::factory()->admin()->create();
    $kategori = UrunKategori::factory()->create();
    $urun = Urun::factory()->for($kategori, 'kategori')->create([
        'resim_yolu' => 'urunler/eski-resim.jpg',
    ]);

    $response = $this->actingAs($admin)->put(
        route('admin.urunler.update', $urun),
        validUrunPayload($kategori, [
            'slug' => $urun->slug,
            'urun_kodu' => $urun->urun_kodu,
            'resim' => UploadedFile::fake()->image('yeni-resim.webp', 800, 800),
        ]),
    );
    $newImagePath = $urun->refresh()->resim_yolu;

    $response
        ->assertRedirectToRoute('admin.urunler.index')
        ->assertSessionHas('status', 'Ürün başarıyla güncellendi.');
    expect($newImagePath)->not->toBe('urunler/eski-resim.jpg');
    Storage::disk('public')->assertMissing('urunler/eski-resim.jpg');
    Storage::disk('public')->assertExists($newImagePath);
});

it('removes the current image without requiring a replacement', function () {
    Storage::fake('public');
    Storage::disk('public')->put('urunler/kaldirilacak.jpg', 'old-image');
    $admin = User::factory()->admin()->create();
    $kategori = UrunKategori::factory()->create();
    $urun = Urun::factory()->for($kategori, 'kategori')->create([
        'resim_yolu' => 'urunler/kaldirilacak.jpg',
    ]);

    $this->actingAs($admin)->put(
        route('admin.urunler.update', $urun),
        validUrunPayload($kategori, [
            'slug' => $urun->slug,
            'urun_kodu' => $urun->urun_kodu,
            'resmi_sil' => '1',
        ]),
    )->assertRedirectToRoute('admin.urunler.index');

    expect($urun->refresh()->resim_yolu)->toBeNull();
    Storage::disk('public')->assertMissing('urunler/kaldirilacak.jpg');
});

it('deletes the product image when the product is deleted', function () {
    Storage::fake('public');
    Storage::disk('public')->put('urunler/silinecek.jpg', 'product-image');
    $admin = User::factory()->admin()->create();
    $urun = Urun::factory()->create([
        'resim_yolu' => 'urunler/silinecek.jpg',
    ]);

    $response = $this->actingAs($admin)
        ->delete(route('admin.urunler.destroy', $urun));

    $response
        ->assertRedirectToRoute('admin.urunler.index')
        ->assertSessionHas('status', 'Ürün ve ilişkili resmi silindi.');
    $this->assertModelMissing($urun);
    Storage::disk('public')->assertMissing('urunler/silinecek.jpg');
});

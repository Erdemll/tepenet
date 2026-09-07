<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveUrunRequest;
use App\Models\Urun;
use App\Models\UrunKategori;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use RuntimeException;
use Throwable;

class UrunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, AdminTable $adminTable): View
    {
        $table = $adminTable->paginate(
            request: $request,
            query: Urun::query()->with('kategori:id,baslik'),
            searchableColumns: ['baslik', 'urun_kodu', 'aciklama', 'slug'],
            sortableColumns: ['baslik', 'urun_kodu', 'kategori_id', 'created_at'],
        );

        return view('admin.urunler.index', ['table' => $table]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.urunler.create', [
            'urun' => new Urun,
            'kategoriler' => $this->kategoriler(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveUrunRequest $request): RedirectResponse
    {
        $attributes = $request->safe()->only([
            'baslik',
            'kategori_id',
            'aciklama',
            'urun_kodu',
            'slug',
        ]);
        $imagePath = null;

        try {
            $image = $request->file('resim');

            if ($image instanceof UploadedFile) {
                $imagePath = $this->storeImage($image);
                $attributes['resim_yolu'] = $imagePath;
            }

            Urun::query()->create($attributes);
        } catch (Throwable $exception) {
            $this->deleteImage($imagePath);

            throw $exception;
        }

        return redirect()
            ->route('admin.urunler.index')
            ->with('status', 'Ürün başarıyla eklendi.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Urun $urun): View
    {
        return view('admin.urunler.edit', [
            'urun' => $urun,
            'kategoriler' => $this->kategoriler(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveUrunRequest $request, Urun $urun): RedirectResponse
    {
        $attributes = $request->safe()->only([
            'baslik',
            'kategori_id',
            'aciklama',
            'urun_kodu',
            'slug',
        ]);
        $oldImagePath = $urun->resim_yolu;
        $newImagePath = null;

        try {
            $image = $request->file('resim');

            if ($image instanceof UploadedFile) {
                $newImagePath = $this->storeImage($image);
                $attributes['resim_yolu'] = $newImagePath;
            } elseif ($request->boolean('resmi_sil')) {
                $attributes['resim_yolu'] = null;
            }

            $urun->update($attributes);
        } catch (Throwable $exception) {
            $this->deleteImage($newImagePath);

            throw $exception;
        }

        if (($newImagePath !== null || $request->boolean('resmi_sil')) && $oldImagePath !== null) {
            $this->deleteImage($oldImagePath);
        }

        return redirect()
            ->route('admin.urunler.index')
            ->with('status', 'Ürün başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Urun $urun): RedirectResponse
    {
        $imagePath = $urun->resim_yolu;

        $urun->delete();
        $this->deleteImage($imagePath);

        return redirect()
            ->route('admin.urunler.index')
            ->with('status', 'Ürün ve ilişkili resmi silindi.');
    }

    /**
     * @return Collection<int, UrunKategori>
     */
    private function kategoriler(): Collection
    {
        return UrunKategori::query()
            ->orderBy('baslik')
            ->get(['id', 'baslik']);
    }

    private function storeImage(UploadedFile $image): string
    {
        $path = $image->storePublicly('urunler', 'public');

        if (! is_string($path)) {
            throw new RuntimeException('Ürün resmi kaydedilemedi.');
        }

        return $path;
    }

    private function deleteImage(?string $path): void
    {
        if ($path === null || ! Str::startsWith($path, 'urunler/') || str_contains($path, '..')) {
            return;
        }

        Storage::disk('public')->delete($path);
    }
}

<x-admin.layout
  title="Ürünü Düzenle"
  heading="Ürünü Düzenle"
  active="urunler"
  description="Ürün bilgilerini ve görselini güncelleyin.">
  <form method="POST" action="{{ route('admin.urunler.update', $urun) }}" enctype="multipart/form-data" class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">
    @csrf
    @method('PUT')
    @include('admin.urunler._form', ['submitLabel' => 'Değişiklikleri kaydet'])
  </form>
</x-admin.layout>

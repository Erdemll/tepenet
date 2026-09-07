<x-admin.layout
  title="Yeni Ürün"
  heading="Yeni Ürün"
  active="urunler"
  description="Ürün bilgilerini, kategorisini ve görselini ekleyin.">
  <form method="POST" action="{{ route('admin.urunler.store') }}" enctype="multipart/form-data" class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">
    @csrf
    @include('admin.urunler._form', ['submitLabel' => 'Ürünü ekle'])
  </form>
</x-admin.layout>

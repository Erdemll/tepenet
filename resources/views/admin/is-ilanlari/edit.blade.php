<x-admin.layout
  title="İş İlanını Düzenle"
  heading="İş İlanını Düzenle"
  active="is-ilanlari"
  description="İlan bilgilerini ve yayın durumunu güncelleyin.">
  <form method="POST" action="{{ route('admin.is-ilanlari.update', $isIlani) }}" class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">
    @csrf
    @method('PUT')
    @include('admin.is-ilanlari._form', ['submitLabel' => 'Değişiklikleri kaydet'])
  </form>
</x-admin.layout>

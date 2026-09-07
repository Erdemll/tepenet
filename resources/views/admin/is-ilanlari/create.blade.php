<x-admin.layout
  title="Yeni İş İlanı"
  heading="Yeni İş İlanı"
  active="is-ilanlari"
  description="Public kariyer sayfasında yayınlanacak yeni ilanı hazırlayın.">
  <form method="POST" action="{{ route('admin.is-ilanlari.store') }}" class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">
    @csrf
    @include('admin.is-ilanlari._form', ['submitLabel' => 'İlanı ekle'])
  </form>
</x-admin.layout>

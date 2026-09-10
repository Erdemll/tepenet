<x-admin.layout
  title="Blogu Düzenle"
  heading="Blogu Düzenle"
  active="bloglar"
  description="Blog başlığını ve HTML içeriğini güncelleyin.">
  <form method="POST" action="{{ route('admin.bloglar.update', $blog) }}" class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">
    @csrf
    @method('PUT')
    @include('admin.bloglar._form', ['submitLabel' => 'Değişiklikleri kaydet'])
  </form>
</x-admin.layout>

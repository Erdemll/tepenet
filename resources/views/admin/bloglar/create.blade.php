<x-admin.layout
  title="Yeni Blog"
  heading="Yeni Blog"
  active="bloglar"
  description="Yeni blog yazısını başlığı ve HTML içeriğiyle oluşturun.">
  <form method="POST" action="{{ route('admin.bloglar.store') }}" class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">
    @csrf
    @include('admin.bloglar._form', ['submitLabel' => 'Blogu ekle'])
  </form>
</x-admin.layout>

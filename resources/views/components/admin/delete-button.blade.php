@props([
  'action',
  'label' => 'Kaydı sil',
])

<form method="POST" action="{{ $action }}" onsubmit="return confirm('Bu kayıt silinecek. Devam etmek istiyor musunuz?')">
  @csrf
  @method('DELETE')
  <button type="submit" aria-label="{{ $label }}" class="inline-flex items-center rounded-lg border border-red-200 px-3 py-2 text-xs font-semibold text-red-700 transition hover:bg-red-50 focus:outline-none focus:ring-4 focus:ring-red-100">
    Sil
  </button>
</form>

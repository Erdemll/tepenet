@php
  $inputClass = 'block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-950 outline-none transition placeholder:text-slate-400 focus:border-red-700 focus:ring-4 focus:ring-red-100';
  $content = old('icerik', $blog->icerik ?? '');
@endphp

<div class="grid gap-6">
  <x-admin.form-field name="baslik" label="Blog başlığı" required>
    <input id="baslik" name="baslik" type="text" value="{{ old('baslik', $blog->baslik) }}" required maxlength="255" class="{{ $inputClass }}" />
  </x-admin.form-field>

  <x-admin.form-field name="icerik" label="Blog içeriği" required hint="Biçimlendirme araçlarını kullanabilir veya HTML içeriğini doğrudan düzenleyebilirsiniz. Script, iframe ve güvenli olmayan bağlantılar kaydedilmez.">
    <div class="overflow-hidden rounded-xl border border-slate-300 focus-within:border-red-700 focus-within:ring-4 focus-within:ring-red-100">
      <div class="flex flex-wrap gap-1 border-b border-slate-200 bg-slate-50 p-2" role="toolbar" aria-label="İçerik biçimlendirme araçları">
        <button type="button" data-editor-command="bold" class="rounded-lg px-3 py-2 text-sm font-bold text-slate-700 transition hover:bg-white" aria-label="Kalın">B</button>
        <button type="button" data-editor-command="italic" class="rounded-lg px-3 py-2 text-sm italic text-slate-700 transition hover:bg-white" aria-label="İtalik">I</button>
        <button type="button" data-editor-command="underline" class="rounded-lg px-3 py-2 text-sm underline text-slate-700 transition hover:bg-white" aria-label="Altı çizili">U</button>
        <button type="button" data-editor-command="formatBlock" data-editor-value="<h2>" class="rounded-lg px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-white">Başlık</button>
        <button type="button" data-editor-command="insertUnorderedList" class="rounded-lg px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-white">Liste</button>
        <button type="button" data-editor-command="createLink" class="rounded-lg px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-white">Bağlantı</button>
      </div>
      <div id="blog-editor" contenteditable="true" role="textbox" aria-multiline="true" aria-label="Blog HTML içeriği" class="min-h-80 px-4 py-4 text-sm leading-7 text-slate-800 outline-none empty:before:text-slate-400 empty:before:content-['İçeriği_buraya_yazın...']"></div>
    </div>
    <textarea id="icerik" name="icerik" class="sr-only" tabindex="-1" aria-hidden="true">{{ $content }}</textarea>
  </x-admin.form-field>
</div>

<div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">
  <a href="{{ route('admin.bloglar.index') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Vazgeç</a>
  <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-red-700 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-200">{{ $submitLabel }}</button>
</div>

<script>
  (() => {
    const editor = document.getElementById('blog-editor');
    const content = document.getElementById('icerik');

    if (!editor || !content) {
      return;
    }

    editor.innerHTML = content.value;

    document.querySelectorAll('[data-editor-command]').forEach((button) => {
      button.addEventListener('click', () => {
        editor.focus();
        const command = button.dataset.editorCommand;
        const value = button.dataset.editorValue || null;

        if (command === 'createLink') {
          const url = window.prompt('Bağlantı adresi');

          if (url) {
            document.execCommand(command, false, url);
          }
        } else {
          document.execCommand(command, false, value);
        }

        content.value = editor.innerHTML;
      });
    });

    editor.addEventListener('paste', (event) => {
      event.preventDefault();
      const text = event.clipboardData?.getData('text/plain') || '';
      document.execCommand('insertText', false, text);
      content.value = editor.innerHTML;
    });

    editor.closest('form')?.addEventListener('submit', () => {
      content.value = editor.innerHTML;
    });
  })();
</script>

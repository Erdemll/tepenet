@php
  $inputClass = 'block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-950 outline-none transition placeholder:text-slate-400 focus:border-red-700 focus:ring-4 focus:ring-red-100';
  $content = old('icerik', $blog->icerik ?? '');
@endphp

@pushOnce('head', 'quill-editor-styles')
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
  <style>
    [data-blog-editor] .ql-toolbar.ql-snow {
      border: 0;
      border-bottom: 1px solid #e2e8f0;
      background: #f8fafc;
    }

    [data-blog-editor] .ql-container.ql-snow {
      border: 0;
      font-family: inherit;
      font-size: 0.875rem;
    }

    [data-blog-editor] .ql-editor {
      min-height: 20rem;
      padding: 1rem;
      color: #1e293b;
      line-height: 1.75;
    }

    [data-blog-editor] .ql-editor.ql-blank::before {
      color: #94a3b8;
      font-style: normal;
    }
  </style>
@endPushOnce

<div class="grid gap-6">
  <x-admin.form-field name="baslik" label="Blog başlığı" required>
    <input id="baslik" name="baslik" type="text" value="{{ old('baslik', $blog->baslik) }}" required maxlength="255" class="{{ $inputClass }}" />
  </x-admin.form-field>

  <x-admin.form-field name="icerik" label="Blog içeriği" required hint="Biçimlendirme araçlarıyla metni düzenleyin. Görsel, video ve benzeri ekler desteklenmez; script, iframe ve güvenli olmayan bağlantılar kaydedilmez.">
    <div data-blog-editor class="overflow-hidden rounded-xl border border-slate-300 focus-within:border-red-700 focus-within:ring-4 focus-within:ring-red-100">
      <div id="blog-editor"></div>
    </div>
    <textarea id="icerik" name="icerik" class="sr-only" tabindex="-1" aria-hidden="true">{{ $content }}</textarea>
  </x-admin.form-field>
</div>

<div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">
  <a href="{{ route('admin.bloglar.index') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Vazgeç</a>
  <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-red-700 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-200">{{ $submitLabel }}</button>
</div>

@pushOnce('scripts', 'quill-editor-script')
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
@endPushOnce

@pushOnce('scripts', 'blog-quill-initialization')
  <script>
    (() => {
      const editor = document.getElementById('blog-editor');
      const content = document.getElementById('icerik');

      if (!editor || !content || typeof Quill === 'undefined') {
        return;
      }

      const quill = new Quill(editor, {
        theme: 'snow',
        placeholder: 'İçeriği buraya yazın...',
        modules: {
          toolbar: [
            ['bold', 'italic', 'underline', 'strike'],
            [{ header: [2, 3, false] }],
            ['blockquote'],
            [{ list: 'ordered' }, { list: 'bullet' }],
            ['link'],
            ['clean'],
          ],
        },
        formats: ['bold', 'italic', 'underline', 'strike', 'header', 'blockquote', 'list', 'link'],
      });

      quill.root.setAttribute('aria-label', 'Blog HTML içeriği');

      if (content.value !== '') {
        quill.clipboard.dangerouslyPasteHTML(content.value);
      }

      const synchronizeContent = () => {
        content.value = quill.getText().trim() === '' ? '' : quill.root.innerHTML;
      };

      quill.on('text-change', synchronizeContent);
      editor.closest('form')?.addEventListener('submit', synchronizeContent);
    })();
  </script>
@endPushOnce

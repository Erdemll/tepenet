@props([
  'field',
  'label',
  'sort',
  'direction',
  'align' => 'left',
])

@php
  $isActive = $sort === $field;
  $nextDirection = $isActive && $direction === 'asc' ? 'desc' : 'asc';
  $query = array_merge(request()->query(), [
    'sort' => $field,
    'direction' => $nextDirection,
  ]);
  unset($query['page']);
@endphp

<th scope="col" @class(['px-5 py-3.5', 'text-right' => $align === 'right'])>
  <a href="{{ url()->current().'?'.http_build_query($query) }}" class="inline-flex items-center gap-1.5 transition hover:text-slate-900">
    {{ $label }}
    <span class="text-sm normal-case" aria-hidden="true">
      @if (! $isActive)
        ↕
      @elseif ($direction === 'asc')
        ↑
      @else
        ↓
      @endif
    </span>
    <span class="sr-only">{{ $isActive && $direction === 'asc' ? 'azalan' : 'artan' }} sırala</span>
  </a>
</th>

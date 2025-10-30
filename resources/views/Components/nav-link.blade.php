@props(['active' => false])

@php
$classes = $active
    ? 'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-indigo-700 bg-indigo-50 rounded-lg shadow-inner border border-indigo-100 transition-all duration-200'
    : 'relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-indigo-700 hover:bg-indigo-50 rounded-lg transition-all duration-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}
   aria-current="{{ $active ? 'page' : 'false' }}">
   <span>{{ $slot }}</span>
</a>

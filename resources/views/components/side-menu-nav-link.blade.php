@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-6 py-2 mt-4 text-gray-900 bg-gray-300 border-l-4 border-gray-700 hover:bg-gray-300 hover:bg-opacity-25 font-semibold'
            : 'flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

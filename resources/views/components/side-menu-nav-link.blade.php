@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-6 py-2 mt-4 text-white bg-indigo-700 border-l-4 border-white hover:bg-indigo-700 hover:bg-opacity-25 font-semibold'
            : 'flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

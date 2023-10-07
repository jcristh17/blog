@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-red-700 hover:cursor-pointer hover:text-red-500'
            : 'text-gray-700 hover:cursor-pointer hover:text-red-500';
@endphp

<i {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</i>
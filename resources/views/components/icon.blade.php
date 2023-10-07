@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-green-700 hover:cursor-pointer hover:text-green-500'
            : 'text-gray-700 hover:cursor-pointer hover:text-gray-500';
@endphp

<i {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</i>
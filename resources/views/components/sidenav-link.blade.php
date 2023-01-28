@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-gray-100 border-blue-500 border-l-4 text-blue-500 flex items-center justify-start gap-4 px-4 py-3 transition duration-150 ease-in-out'
            : 'flex items-center justify-start text-white gap-4 px-5 py-3 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

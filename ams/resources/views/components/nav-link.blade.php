@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center justify-center mt-3 px-1 pt-1 border-transparent text-sm font-medium leading-5 text-blue-600 stroke-3 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'flex items-center justify-center mt-3 px-1 pt-1 border-transparent text-sm font-medium leading-5 title-color hover:text-blue-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

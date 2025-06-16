@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 py-2 border-b-2 border-green-500 text-sm font-medium leading-5 text-green-600 bg-green-50 rounded-t-lg focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200 ease-in-out'
            : 'inline-flex items-center px-3 py-2 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-600 hover:text-green-600 hover:border-green-300 hover:bg-green-50 rounded-t-lg focus:outline-none focus:text-green-600 focus:border-green-300 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
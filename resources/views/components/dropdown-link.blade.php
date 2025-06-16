@props(['variant' => 'default'])

@php
$classes = match ($variant) {
    'danger' => 'block w-full px-4 py-3 text-start text-sm font-medium leading-5 text-red-600 hover:bg-red-50 hover:text-red-700 focus:outline-none focus:bg-red-50 focus:text-red-700 focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-200 ease-in-out border-t border-gray-100 first:border-t-0',
    'primary' => 'block w-full px-4 py-3 text-start text-sm font-medium leading-5 text-green-600 hover:bg-green-50 hover:text-green-700 focus:outline-none focus:bg-green-50 focus:text-green-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200 ease-in-out first:border-t-0',
    default => 'block w-full px-4 py-3 text-start text-sm font-medium leading-5 text-gray-700 hover:bg-green-50 hover:text-green-600 focus:outline-none focus:bg-green-50 focus:text-green-600 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200 ease-in-out first:border-t-0',
};
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
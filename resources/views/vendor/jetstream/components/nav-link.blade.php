@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-indigo-500 text-lr dark:text-white font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 dark:focus:border-indigo-700 transition'
            : 'inline-flex items-center px-1 pt-1 border-b-4 border-transparent dark:border-transparent text-sm font-medium leading-5 text-gray-500 dark:hover:text-gray-400 hover:text-gray-700 dark:hover:border-gray-300 hover:border-gray-300 focus:outline-none    focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

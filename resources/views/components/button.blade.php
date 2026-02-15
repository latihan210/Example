@props([
    'type' => 'submit',
    'as' => 'button',
    'variant' => 'primary',
])

@php
    $baseClasses =
        'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs ext-white uppercase tracking-widest dark:hover:bg-white dark:focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150';

    $variants = [
        'danger' =>
            'bg-red-600 dark:bg-red-700 dark:text-red-100 hover:bg-red-500 focus:bg-red-500 active:bg-red-700 dark:active:bg-red-800 dark:focus:ring-offset-red-800',
        'success' =>
            'bg-green-600 dark:bg-green-700 dark:text-green-100 hover:bg-green-500 focus:bg-green-500 active:bg-green-700 dark:active:bg-green-800 dark:focus:ring-offset-green-800',
        'warning' =>
            'bg-yellow-500 dark:bg-yellow-600 dark:text-yellow-100 hover:bg-yellow-400 focus:bg-yellow-400 active:bg-yellow-600 dark:active:bg-yellow-800 dark:focus:ring-offset-yellow-800',
        'secondary' =>
            'bg-gray-800 dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 dark:active:bg-gray-300 dark:focus:ring-offset-gray-800',
        'primary' =>
            'bg-blue-600 dark:bg-blue-700 dark:text-blue-100 hover:bg-blue-500 focus:bg-blue-500 active:bg-blue-700 dark:active:bg-blue-800 dark:focus:ring-offset-blue-800',
    ];

    $variantClasses = $variants[$variant] ?? $variants['primary'];
    $classes = $baseClasses . ' ' . $variantClasses;
@endphp

@if ($as == 'button')
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@else
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@endif

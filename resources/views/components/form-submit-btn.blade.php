@props(['text' => 'Save', 'type' => 'submit', 'color' => 'indigo'])
@php
    // Define color variants
    $colorClasses = [
        'indigo' => 'bg-indigo-600 hover:bg-indigo-500 focus-visible:outline-indigo-600',
        'emerald' => 'bg-emerald-600 hover:bg-emerald-500 focus-visible:outline-emerald-600',
        'red' => 'bg-red-600 hover:bg-red-500 focus-visible:outline-red-600',
        'blue' => 'bg-blue-600 hover:bg-blue-500 focus-visible:outline-blue-600',
        'yellow' => 'bg-yellow-600 hover:bg-yellow-500 focus-visible:outline-yellow-600',
        'green' => 'bg-green-600 hover:bg-green-500 focus-visible:outline-green-600',
        'purple' => 'bg-purple-600 hover:bg-purple-500 focus-visible:outline-purple-600',
        'pink' => 'bg-pink-600 hover:bg-pink-500 focus-visible:outline-pink-600',
        'gray' => 'bg-gray-600 hover:bg-gray-500 focus-visible:outline-gray-600',
    ];

    $classes = $colorClasses[$color] ?? $colorClasses['indigo'];
@endphp


<button type="{{ $type }}" {{ $attributes->merge(['class' => "transition-all duration-300 cursor-pointer rounded-md px-3 py-2 text-sm font-semibold text-white shadow-xs focus-visible:outline-2 focus-visible:outline-offset-2 {$classes}"]) }}>
    {{ $text }}
</button>
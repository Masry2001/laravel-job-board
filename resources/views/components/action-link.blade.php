@props(['href', 'text' => 'Link', 'variant' => 'default', 'color' => 'indigo'])
@php
  // Define color variants for colored buttons
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
    'orange' => 'bg-orange-600 hover:bg-orange-500 focus-visible:outline-orange-600',
    'rose' => 'bg-rose-600 hover:bg-rose-500 focus-visible:outline-rose-600',
    'cyan' => 'bg-cyan-600 hover:bg-cyan-500 focus-visible:outline-cyan-600',
    'teal' => 'bg-teal-600 hover:bg-teal-500 focus-visible:outline-teal-600',

  ];

  // Choose classes based on variant
  if ($variant === 'cancel') {
    $classes = 'text-sm/6 font-semibold text-gray-900 rounded-md hover:bg-gray-700 px-3 py-2 hover:text-white transition-all duration-300';
  } else {
    // Default/button variant
    $colorClass = $colorClasses[$color] ?? $colorClasses['indigo'];
    $classes = "mx-4 cursor-pointer rounded-md px-3 py-2 text-sm font-semibold text-white shadow-xs focus-visible:outline-2 focus-visible:outline-offset-2 transition-colors duration-300 {$colorClass}";
  }
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
  {{ $text }}
</a>
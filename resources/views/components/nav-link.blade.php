@php
  $currentRoute = $_SERVER['REQUEST_URI'];
  $current = "bg-gray-900 text-white";
  $default = "text-gray-300 hover:bg-white/5 hover:text-white";
  $href = $attributes->get('href');
  $active = $currentRoute === $href;


 @endphp

<a href="{{ $href }}" class="rounded-md px-3 py-2 text-sm font-medium {{ $active ? $current : $default }}" {{ $attributes }}>
  {{ $slot }}
</a>
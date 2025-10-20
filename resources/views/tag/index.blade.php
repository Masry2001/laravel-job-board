<x-layout title="{{ $title }}">
  <h3 class="text-3xl font-semibold mb-4">Tags Page</h3>
  <hr class="my-4 border-gray-300">

  <div class="flex flex-wrap gap-6">
    @foreach ($tags as $tag)
      <a href="tags/{{ $tag->id }}">
        <span
          class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-full shadow-sm hover:bg-blue-700 transition">
          {{ ucfirst($tag->title) }}
        </span>
      </a>
    @endforeach
  </div>

  <div class="mt-6">

  </div>
</x-layout>
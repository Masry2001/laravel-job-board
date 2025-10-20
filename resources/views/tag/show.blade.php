<x-layout title="{{ $title }}">
  <h3 class="text-3xl">Single Tag Page</h3>
  <hr class="my-4">

  <div class="flex items-center mb-4">
    <h2 class="text-2xl font-semibold text-blue-800">Tag: {{ $tag->title }}</h2>
  </div>

  <hr class="my-4 text-gray-300">
  <h2 class="text-xl font-semibold mb-2">Posts with this Tag:</h2>
  <hr class="my-2 text-gray-200">
  @if ($tag->posts->isEmpty())
    <p class="text-gray-500 italic">No posts available for this tag.</p>
  @else
    <ul class="space-y-4">
      @foreach ($tag->posts as $post)
        <div class="flex items-center mb-4">
          <a href="/blog/{{ $post->id }}" class="text-blue-500 hover:underline">
            <h2 class="text-2xl font-semibold">Title: {{ $post->title }}</h2>
          </a>
          @if ($post->tags()->count() > 0)
            <div class="ml-4 flex items-center space-x-2">
              @foreach ($post->tags()->take(3)->get() as $tag)
                <a href="/tags/{{ $tag->id }}">
                  <span
                    class="inline-block bg-gray-200 text-gray-700 text-sm font-medium px-3 py-1 rounded-full hover:underline">
                    {{ $tag->title }}
                  </span>
                </a>
              @endforeach
              @if ($post->tags()->count() > 3)
                <span class="inline-block bg-gray-200 text-gray-700 text-sm font-medium px-3 py-1 rounded-full">etc</span>
              @endif
            </div>
          @endif
        </div>
        <h2 class="text-gray-600">Author: {{ $post->author }}</h2>
        <h2>Body: {{ $post->body }}</h2>
        {{-- Check if post has comments --}}
        @if ($post->comments->count() > 0)
          <a href="/blog/{{ $post->id }}">
            <p class="text-green-600 font-semibold mt-2 hover:underline">
              There are comments for this post
            </p>
          </a>
        @endif
        <hr class="my-4 text-gray-300">
      @endforeach
    </ul>
  @endif
</x-layout>
<x-layout title="{{ $title }}">


  <h3 class="text-3xl">Blog Page</h3>
  <hr class="my-4">
  @foreach ($posts as $post)
    <div class="flex items-center mb-4">
      <a href="/blog/{{ $post->id }}" class="text-blue-500 hover:underline">
        <h2 class="text-2xl font-semibold">Title: {{ $post->title }}</h2>
      </a>
      @if ($post->tags()->count() > 0)
        <div class="ml-4 flex items-center space-x-2">
          @foreach ($post->tags()->take(3)->get() as $tag)
            <a href="/tags/{{ $tag->id }}">
              <span class="inline-block bg-gray-200 text-gray-700 text-sm font-medium px-3 py-1 rounded-full hover:underline">
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
  {{ $posts->links() }}
</x-layout>
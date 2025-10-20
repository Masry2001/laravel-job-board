<x-layout title="{{ $title }}">

  <h3 class="text-3xl">Single Post Page</h3>
  <hr class="my-4">

  <div class="flex items-center mb-4">
    <a href="#" class="text-blue-500">
      <h2 class="text-2xl font-semibold">Title: {{ $post->title }}</h2>
    </a>
    @if ($post->tags()->count() > 0)
      <div class="ml-4 flex items-center space-x-2">
        @foreach ($post->tags()->get() as $tag)
          <a href="/tags/{{ $tag->id }}">
            <span class="inline-block bg-gray-200 text-gray-700 text-sm font-medium px-3 py-1 rounded-full hover:underline">
              {{ $tag->title }}
            </span>
          </a>
        @endforeach

      </div>
    @endif
  </div>

  <h2 class="text-gray-600">Author: {{ $post->author }}</h2>
  <h2>Body: {{ $post->body }}</h2>

  <hr class="my-4 text-gray-300">
  <h2 class="text-xl font-semibold mb-2">Comments:</h2>
  <hr class="my-2 text-gray-200">
  @if ($post->comments->isEmpty())
    <p class="text-gray-500 italic">No comments yet for this post.</p>
  @else
    <ul class="space-y-4">
      @foreach ($post->comments as $comment)
        <li class="border-b border-gray-200 pb-2">
          <p><strong>Author:</strong> {{ $comment->author }}</p>
          <p>{{ $comment->content }}</p>
        </li>
      @endforeach
    </ul>
  @endif

</x-layout>
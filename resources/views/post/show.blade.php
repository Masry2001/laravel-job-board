<x-layout title="{{ $title }}" :post="$post">

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

  <!-- form will be here  -->
  <h2 class="text-gray-600">Leave a comment on this post</h2>

  <form action="/comments" method="post">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">

    <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
      <div class="sm:col-span-3">
        <x-form-input name="author" label="Author" inputId="comment-author" />
      </div>

      <div class="col-span-full">
        <x-form-textarea name="content" label="Comment" inputId="comment-content" :rows="2" />
      </div>
    </div>

    <div class="mt-3 flex items-center justify-end gap-x-6">
      <x-form-submit-btn text="Comment" color="emerald" />
    </div>
  </form>

  <hr class="my-4 text-gray-300">
  <h2 class="text-xl font-semibold mb-2">Comments:</h2>
  <hr class="my-2 text-gray-200">

  <!-- put a message here indicate that a new comment added -->
  @if (session('success'))
    <h3 class="text-2xl text-green-800 mb-4 bg-green-50 px-3 py-2">
      {{ session('success') }}
    </h3>
  @endif



  @if ($post->comments->isEmpty())
    <p class="text-gray-500 italic">No comments yet for this post.</p>
  @else
    <ul class="space-y-4">
      @foreach ($post->comments as $comment)
        <li class="flex items-start justify-between border-b border-gray-200 pb-4 gap-4">
          <div class="flex-1">
            <p class="font-semibold text-gray-900 mb-1">{{ $comment->author }}</p>
            <p class="text-gray-700">{{ $comment->content }}</p>
          </div>

          <div class="flex items-center gap-2 flex-shrink-0">
            <x-action-link href="{{ route('comments.edit', $comment->id) }}" color="purple" text="Edit Comment" />

            <x-form-delete-btn action="{{ route('comments.destroy', $comment->id) }}" text="Delete Comment" color="rose"
              confirmMessage="Do You Want To Delete This Comment" />
          </div>
        </li>
      @endforeach
    </ul>
  @endif

</x-layout>
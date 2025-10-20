<x-layout title="{{ $title }}">


  <h3 class="text-3xl">Comments Page</h3>
  <hr class="my-4">
  @foreach ($comments as $comment)
    <h2 class="text-2xl">Content: {{ $comment->content }}</h2>
    <h2 class="text-gray-500">Author: {{ $comment->author }}</h2>
    <a href="/blog/{{ $comment->post->id }}" class="text-blue-500">
      <h2>Post Title: {{ $comment->post->title }}</h2>
    </a>
    <hr class="my-4 text-gray-300">

  @endforeach
  {{ $comments->links() }}
</x-layout>
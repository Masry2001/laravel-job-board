<x-layout title="{{ $title }}">


  <h2>Single Comment Page</h2>

  <h2 class="text-2xl">{{ $comment->author }}</h2>
  <h2>{{ $comment->content }}</h2>

</x-layout>
<x-layout title="{{ $title }}">


  <h2>Edit Comment Page</h2>



  <form action="/comments/{{ $comment->id }}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="post_id" value="{{ $comment->post_id }}">

    <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
      <div class="sm:col-span-3">
        <x-form-input name="author" label="Author" inputId="comment-author" :value="$comment->author" />
      </div>

      <div class="col-span-full">
        <x-form-textarea name="content" label="Comment" inputId="comment-content" :rows="2"
          :value="$comment->content" />
      </div>
    </div>

    <div class="mt-3 flex items-center justify-end gap-x-6">
      <x-action-link href="/blog/{{  $comment->post_id }}" variant="cancel" text="Cancel" />
      <x-form-submit-btn text="update" color="emerald" />
    </div>
  </form>

</x-layout>
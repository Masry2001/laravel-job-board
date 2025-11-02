<x-layout title="{{ $title }}">

  <form action="/blog/{{ $post->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-6">
        <p class="mt-1 text-sm/6 text-gray-600">Use The Form To A Post</p>

        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <!-- title -->
          <div class="sm:col-span-3">
            <x-form-input name="title" label="Title" inputId="title" :value="$post->title" />
          </div>

          <!-- author -->
          <div class="sm:col-span-3">
            <x-form-input name="author" label="Author" inputId="author" :value="$post->user->name" readonly />

          </div>

          <!-- body -->
          <div class="col-span-full">
            <x-form-textarea name="body" label="Content" inputId="body" :value="$post->body"
              description="Write a few sentences about the post." />
          </div>

          <!-- checkbox -->
          <div class="col-span-full">
            <x-form-checkbox name="published" label="Publish" inputId="publish" :checked="$post->published ?? false" />
          </div>

        </div>
      </div>

    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <x-action-link href="/blog" variant="cancel" text="Cancel" />
      <x-form-submit-btn />
    </div>
  </form>

</x-layout>
<x-layout title="{{ $title }}">

  <form action="/blog" method="POST">
    @csrf
    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

      <div class="sm:col-span-3">
        <x-form-input name="title" label="Title" inputId="title" autocomplete="given-name" />
      </div>

      <div class="sm:col-span-3">
        <x-form-input name="author" label="Author" inputId="author" autocomplete="given-name"
          :value="auth()->user()->name" readonly />
      </div>

      <div class="col-span-full">
        <x-form-textarea name="body" label="Content" inputId="body"
          description="Write a few sentences about the post." />
      </div>

      <div class="col-span-full">
        <x-form-checkbox name="published" label="Publish" inputId="publish"
          description="check to publish the post, uncheck to save it as a draft." :checked="true" />
      </div>

    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <x-action-link href="/blog" variant="cancel" text="Cancel" />

      <x-form-submit-btn />
    </div>
  </form>

</x-layout>
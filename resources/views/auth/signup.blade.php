<x-layout-simple title="{{ $title }}">

  <div class="flex items-center justify-center bg-gray-50" style="min-height: calc(100vh - 200px);">
    <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-8">

      <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Create Your Account</h2>

      <form action="/signup" method="post" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 gap-y-4">

          <x-form-input name="name" label="Name" inputId="name" />
          <x-form-input name="email" label="Email" inputId="email" />
          <x-form-input type="password" name="password" label="Password" inputId="password" />
          <x-form-input type="password" name="password_confirmation" label="Confirm Password"
            inputId="password_confirmation" />
        </div>

        <div class="flex items-center justify-center gap-x-6 mt-6">

          <x-form-submit-btn text="Create Account" color="emerald" class="px-6" />
        </div>
      </form>

    </div>
  </div>

</x-layout-simple>
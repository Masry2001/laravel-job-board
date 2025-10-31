<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>

            <x-form-input name="current_password" label="Current Password" inputId="update_password_current_password"
                autocomplete="current-password" type="password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>

            <x-form-input name="password" label="New Password" inputId="update_password_password"
                autocomplete="new-password" type="password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-form-input name="password_confirmation" label="Confirm Password"
                inputId="update_password_password_confirmation" autocomplete="new-password" type="password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-form-submit-btn color="blue" />


            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 text-green-500 px-4 py-2">{{ __('password updated.') }}
                </p>
            @endif
        </div>
    </form>
</section>
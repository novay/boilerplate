@seoTitle(__('Register'))
<x-guest-layout>
    <x-auth-card>
        <div class="text-center mb-3">
            <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">
                {{ __('Register A New Account') }}
            </h1>
        </div>
        <x-splade-form action="{{ route('register') }}" class="space-y-2 mb-3">
            <x-splade-input id="name" type="text" name="name" :label="__('Name')" autofocus />
            <x-splade-input id="email" type="email" name="email" :label="__('Email')" />
            <x-splade-input id="password" type="password" name="password" :label="__('Password')" autocomplete="new-password" />
            <x-splade-input id="password_confirmation" type="password" name="password_confirmation" :label="__('Confirm Password')" />

            <x-splade-checkbox name="agree" value="1" label="I agree to Terms and Conditions" />
            <x-splade-submit class="mt-5 d-block w-full" :label="__('Register')" />
        </x-splade-form>
        <Link class="text-blue-600 decoration-2 hover:underline font-medium" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </Link>
    </x-auth-card>
</x-guest-layout>

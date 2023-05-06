@seoTitle(__('Login'))
<x-guest-layout>
    <x-auth-card>
        <div class="text-center">
            <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">
                Silahkan Masuk
            </h1>
            @if (Route::has('register'))
            <p class="mt-2 text-gray-600 dark:text-gray-400">
                Don't have an account yet?
                <Link class="text-blue-600 decoration-2 hover:underline font-medium" href="{{ route('register') }}">
                    Sign up here
                </Link>
            </p>
            @endif
        </div>
        <div class="mt-5">
            <div class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-[1_1_0%] before:border-t before:border-gray-200 before:mr-6 after:flex-[1_1_0%] after:border-t after:border-gray-200 after:ml-6 dark:text-gray-500 dark:before:border-gray-600 dark:after:border-gray-600">
                Version {{ env('APP_VERSION') }}
            </div>
        </div>
        <x-auth-session-status class="mb-4" />
        <x-splade-form action="{{ route('login') }}" class="space-y-4 pb-2">

            <x-splade-input id="email" type="email" name="email" :label="__('Email')" autofocus />
            <x-splade-input id="password" type="password" name="password" :label="__('Password')" autocomplete="current-password" />

            <div class="flex justify-between items-center">
                <x-splade-checkbox id="remember" name="remember" :label="__('Remember me')" />
                @if(Route::has('password.request'))
                    <Link class="text-blue-600 decoration-2 hover:underline font-medium" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </Link>
                @endif
            </div>
            <x-splade-submit class="d-block w-full" :label="__('Log in')" />
        </x-splade-form>
    </x-auth-card>
</x-guest-layout>

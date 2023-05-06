<x-guest-layout>
    <x-auth-card>
        <div class="text-center mb-2">
            <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">
                {{ __('Forgot your password?') }}'
            </h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>
        </div>
        <x-auth-session-status class="mb-4" />
        <x-splade-form action="{{ route('password.email') }}" class="space-y-4 pb-2">
            <x-splade-input id="email" class="block mt-1 w-full" type="email" name="email" :label="__('Email')" autofocus />
            <x-splade-submit class="d-block w-full" :label="__('Email Password Reset Link')" />
        </x-splade-form>
        <Link class="text-blue-600 decoration-2 hover:underline font-medium" href="{{ route('login') }}">
            {{ __('Back to Login') }}
        </Link>
    </x-auth-card>
</x-guest-layout>

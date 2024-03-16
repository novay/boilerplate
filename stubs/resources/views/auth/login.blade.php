@seoTitle(__('Login'))
<x-blank-layout>
    <x-auth-card>
        <x-splade-modal max-width="md">
            <div class="mt-3 mb-2">
                @isset($logo)
                    {{ $logo }}
                @else
                    <x-application-logo class="w-16 h-16 fill-current text-gray-500" />
                @endisset
            </div>
        
            <div class="text-start border-l-4 ps-2 dark:border-gray-500 mb-6">
                <h1 class="block font-bold tracking-tight text-gray-700 dark:text-white">
                    {{ ___('Hai, Silahkan Masuk!') }}
                </h1>
                <p v-if="@js(config('boilerplate.settings.register'))" class="text-sm text-gray-600 dark:text-gray-400">
                    {{ ___('Belum memiliki akun?') }}
                    <Link class="text-blue-600 dark:text-blue-500 font-medium" href="{{ route('register') }}">
                        {{ ___('Daftar disini') }}
                    </Link>
                </p>
            </div>
            
            <x-auth-session-status class="mb-4" />
            <x-splade-form action="{{ route('login') }}" class="space-y-3 pb-2" autocomplete="off">
                <x-splade-input type="email" name="email" :label="___('Surel')" placeholder="eg. novay@btekno.id" />
                <x-splade-input type="password" name="password" :label="___('Password')" autocomplete="current-password" :placeholder="___('Minimal 5 karakter')" />

                <div class="flex justify-between items-center text-sm">
                    <x-splade-checkbox id="remember" name="remember" :label="___('Biarkan saya tetap masuk')" />
                    @if(Route::has('password.request'))
                        <Link class="text-blue-600 dark:text-blue-500 font-medium" href="{{ route('password.request') }}">
                            {{ ___('Lupa sandi?') }}
                        </Link>
                    @endif
                </div>
                <x-splade-submit class="d-block w-full" :label="___('Log in')" />
            </x-splade-form>
        </x-splade-modal>
    </x-auth-card>
</x-guest-layout>

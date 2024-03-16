@seoTitle(__('Register'))
<x-blank-layout>
    <x-auth-card>
        <x-splade-modal max-width="md">
            <div class="mt-3 mb-2">
                @isset($logo)
                    {{ $logo }}
                @else
                    <Link href="javascript:;">
                        <x-application-logo class="w-16 h-16 fill-current text-gray-500" />
                    </Link>
                @endisset
            </div>
            <div class="text-start border-l-4 pl-2 mb-4">
                <h1 class="block font-bold tracking-tight text-gray-700 dark:text-white">
                    {{ ___('Register A New Account') }}
                </h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ ___('Sudah punya akun?') }}
                    <Link class="text-blue-600 dark:text-blue-500 font-medium" href="{{ route('login') }}">
                        {{ ___('Masuk disini') }}
                    </Link>
                </p>
            </div>
            <x-splade-form action="{{ route('register') }}" class="space-y-2 mb-3" autocomplete="off">
                <x-splade-input type="text" name="name" :label="___('Nama')" placeholder="eg. Novianto Rahmadi" />
                <x-splade-input type="email" name="email" :label="___('Surel')" placeholder="eg. novay@btekno.id" />
                <div class="grid grid-cols-2 gap-3 pb-2">
                    <x-splade-input type="password" name="password" :label="___('Password')" autocomplete="new-password" :placeholder="___('Minimal 5 karakter')" />
                    <x-splade-input type="password" name="password_confirmation" :label="___('Konfirmasi Password')" :placeholder="___('Ulang Sandi')" />
                </div>
                
                <x-splade-checkbox name="agree" value="1">
                    {{ ___('Saya menyetujui') }} <span class="font-semibold">{{ ___('Syarat dan Ketentuan') }}</span>
                </x-splade-checkbox>
                <x-splade-submit class="w-full" :label="___('Register')" />
            </x-splade-form>
        </x-splade-modal>
    </x-auth-card>
</x-blank-layout>

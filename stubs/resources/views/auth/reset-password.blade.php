@seoTitle(__('Reset Sandi'))
<x-blank-layout>
    <x-auth-card>
        <div class="mt-3 mb-2">
            @isset($logo)
                {{ $logo }}
            @else
                <Link href="/">
                    <x-application-logo class="w-16 h-16 fill-current text-gray-500" />
                </Link>
            @endisset
        </div>
        <div class="text-start border-l-4 pl-2 mb-4">
            <h1 class="text-lg block font-bold tracking-tight text-gray-700 dark:text-white">
                {{ ___('Reset sandi?') }}
            </h1>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                {{ ___('Untuk mengubah sandi, silahkan masukkan sandi baru yang kamu inginkan pada formulir berikut.') }}
            </p>
        </div>
        <x-splade-form :default="['email' => $request->email, 'token' => $request->route('token')]" action="{{ route('password.store') }}" class="space-y-4 pb-1" autocomplete="off">
            <x-splade-input type="email" name="email" :label="__('Email')" data-required readonly />
            <x-splade-input type="password" name="password" :label="__('Password')" data-required :placeholder="___('Masukkan sandi baru')" />
            <x-splade-input type="password" name="password_confirmation" :label="__('Confirm Password')" data-required :placeholder="___('Ulangi sandi baru')" />
            <div class="flex items-center justify-end">
                <x-splade-submit :label="___('Reset Sandi')" />
            </div>
        </x-splade-form>
    </x-auth-card>
</x-blank-layout>

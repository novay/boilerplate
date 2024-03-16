@seoTitle(__('Lupa Sandi'))
<x-blank-layout>
    <x-auth-card>
        <div class="mt-3 mb-2">
            <Link class="flex items-center gap-1 text-sm dark:text-blue-500 text-blue-600 font-medium mb-3" href="{{ route('login') }}">
                <Icon icon="tabler:chevron-left" />
                {{ ___('Kembali') }}
            </Link>
            @isset($logo)
                {{ $logo }}
            @else
                <Link href="javascript:;">
                    <x-application-logo class="w-16 h-16 fill-current text-gray-500" />
                </Link>
            @endisset
        </div>
        <div class="text-start border-l-4 pl-2 mb-4">
            <h1 class="text-lg block font-bold tracking-tight text-gray-700 dark:text-white mb-1">
                {{ ___('Lupa sandi?') }}
            </h1>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                {{ ___('Masukkan email yang kamu gunakan saat pendaftaran dan kami akan mengirim email berisi tautan untuk melakukan pembaruan sandi.') }}
            </p>
        </div>
        <x-auth-session-status class="mb-4" />
        <x-splade-form action="{{ route('password.email') }}" class="space-y-4 pb-2" autocomplete="off">
            <x-splade-input class="block mt-1 w-full" type="email" name="email" :label="___('Surel')" autofocus placeholder="eg. novay@btekno.id" />
            <x-splade-submit class="d-block w-full" :label="___('Email Password Reset Link')" />
        </x-splade-form>
    </x-auth-card>
</x-blank-layout>

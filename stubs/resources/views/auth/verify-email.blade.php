@seoTitle(__('Verifikasi Surel'))
<x-blank-layout>
    <x-auth-card>
        <div class="mt-3 mb-2">
            @isset($logo)
                {{ $logo }}
            @else
                <x-application-logo class="w-16 h-16 fill-current text-gray-500" />
            @endisset
        </div>
    
        <div class="text-start border-l-4 ps-2 dark:border-gray-500 mb-6">
            <h1 class="block font-bold tracking-tight text-gray-700 dark:text-white mb-1">
                {{ ___('Surel kamu telah terdaftar!') }}
            </h1>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-1.5">
                {!! __('Sebelum memulai, mohon lakukan verifikasi email kamu dengan mengunjungi tautan yang kami kirim.') !!}
            </p>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                {!! __('Jika kamu tidak menerima email tersebut, klik tombol dibawah ini untuk mengirim ulang tautan verifikasi.') !!}
            </p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ ___('Tautan verifikasi baru telah dikirim ke alamat email yang kamu berikan saat pendaftaran.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <x-splade-form action="{{ route('verification.send') }}" autocomplete="off">
                <x-splade-submit :label="___('Kirim ulang email verifikasi')" />
            </x-splade-form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ ___('Logout') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-blank-layout>
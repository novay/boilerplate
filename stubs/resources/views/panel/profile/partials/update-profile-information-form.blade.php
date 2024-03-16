<section>
    <header>
        <h2 class="text-lg font-bold text-gray-900 dark:text-white">
            {{ __('Profile Information') }}
        </h2>

        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <x-splade-form method="patch" :action="route($prefix . '.update')" :default="$user" class="mt-6 space-y-4" preserve-scroll>
        <x-splade-input name="name" type="text" :label="___('Nama')" required autocomplete="name" />
        <x-splade-input name="email" type="email" :label="___('Surel')" required autocomplete="email" />
        <x-splade-input name="phone" type="number" :label="___('Nomor Telepon/WA')" placeholder="eg. 8115555573" prepend="+62"></x-splade-input>
        <x-splade-textarea name="address" :label="___('Alamat')" :placeholder="___('eg. Perumahan Citra Gading Residence Ruko A20, Sambutan, Samarinda')" rows="3" autosize></x-splade-textarea>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('Your email address is unverified.') }}

                    <Link method="post" href="{{ route('verification.send') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Click here to re-send the verification email.') }}
                    </Link>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
        @endif

        <div class="flex items-center gap-4">
            <x-splade-submit :label="___('Simpan')" />

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-gray-600">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </x-splade-form>
</section>

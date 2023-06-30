<div class="min-h-screen flex-col">
    @include('layouts.partials.navigation')
    @include('layouts.partials.header')
    @isset($header)
        <div class="border-b bg-white w-screen">
            <div class="w-full py-1 px-1 sm:px-2 md:px-2 lg:pl-60">
                {{ $header }}
            </div>
        </div>
    @endisset
    <main>
        {{ $slot }}
    </main>
</div>
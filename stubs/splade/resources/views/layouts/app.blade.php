<div class="min-h-screen">
    @include('layouts.partials.navigation')
    @include('layouts.partials.header')
    @isset($header)
        <div class="bg-gray-50 border-b">
            <div class="w-full py-3 px-4 sm:px-6 md:px-8 lg:pl-72">
                {{ $header }}
            </div>
        </div>
    @endisset
    <main>
        {{ $slot }}
    </main>
</div>
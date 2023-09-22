<div class="min-h-screen flex-col">
    <div class="md:hidden">
        @include('layouts.partials.navigation')
    </div>
    <div class="hidden md:block z-50">
        @include('layouts.partials.header')
    </div>
    <main class="overflow-scroll h-screen">
        @isset($header)
            <div class="border-b bg-white w-screen pt-0 md:pt-8 fixed dark:bg-gray-800 dark:border-gray-700">
                <div class="w-full py-1 px-1 sm:px-2 md:px-2">
                    {{ $header }}
                </div>
            </div>
            <div class="block pt-7 md:pt-14">
                {{ $slot }}
            </div>
        @else 
            {{ $slot }}
        @endisset
    </main>
</div>
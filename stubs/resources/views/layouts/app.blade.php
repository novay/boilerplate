<x-splade-data remember="panel" local-storage :default="[
    'dark' => false
]">
    <div :class="{'dark': data.dark}">
        <div class="min-h-screen bg-gray-100 dark:bg-slate-900 flex-col">
            <div class="sticky top-0 inset-x-0 flex flex-col bg-white z-10">
                <div class="hidden md:block">
                    @include('layouts.partials.header')
                </div>
                @isset($header)
                    <div class="hidden md:block border-b w-screen pt-0 ps-3 dark:bg-gray-800 dark:border-gray-700 shadow-sm">
                        <div class="container mx-auto py-1">
                            {{ $header }}
                        </div>
                    </div>
                @endisset
            </div>
            <div class="md:hidden">
                @include('layouts.partials.navigation')
                @isset($header)
                    <div class="border-b w-screen pt-0 ps-3 dark:bg-gray-800 dark:border-gray-700 shadow-sm">
                        <div class="container mx-auto py-1">
                            {{ $header }}
                        </div>
                    </div>
                @endisset
            </div>
            <main class="overflow-auto">
                <div class="container mx-auto py-3 px-2 lg:px-0">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</x-splade-data>
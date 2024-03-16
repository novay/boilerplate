<x-splade-toggle>
    <div class="z-60 border-y px-4 sm:px-6 md:px-8 lg:hidden bg-white dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center py-4">
            <button type="button" class="text-gray-500 hover:text-gray-600" data-hs-overlay="#application-sidebar" aria-controls="application-sidebar" aria-label="Toggle navigation">
                <span class="sr-only">Toggle Navigation</span>
                <svg viewBox="0 0 20 20" class="w-6 h-6 fill-current text-gray-600">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
    <div id="application-sidebar" class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 left-0 bottom-0 z-[60] bg-white w-56 border-r border-gray-200 pt-4 pb-0 overflow-y-auto scrollbar-y lg:block lg:translate-x-0 lg:right-auto lg:bottom-0 dark:scrollbar-y dark:bg-gray-800 dark:border-gray-700">
        <div class="px-5 my-1">
            <Link href="javascript:;" class="flex-none text-xl font-semibold text-gray-400 dark:text-white">
                <x-application-logo class="block h-12 w-auto fill-current" />
            </Link>
        </div>
        <nav class="hs-accordion-group p-2 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
            <ul class="space-y-0.5" data-hs-overlay="#application-sidebar">
                <li><span class="text-gray-500 text-xs font-medium uppercase pl-1">Menu Navigasi</span></li>
                @guest 
                    @if(Route::has('login'))
                        <li>
                            <x-splade-link :href="route('login')" modal class="flex items-center gap-x-1.5 px-2 py-1.5 font-medium text-slate-700 rounded hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300">
                                <Icon icon="tabler:login-2" class="w-4 h-4" />
                                {{ ___('Login') }}
                            </x-splade-link>
                        </li>
                        @if(config('boilerplate.settings.register'))
                        <li>
                            <x-splade-link :href="route('register')" modal class="flex items-center gap-x-1.5 px-2 py-1.5 font-medium text-slate-700 rounded hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300">
                                <Icon icon="tabler:user-plus" class="w-4 h-4" />
                                {{ ___('Register') }}
                            </x-splade-link>
                        </li>
                        @endif
                    @endif
                @else
                    @foreach(config('boilerplate.menu') as $key => $value)
                        @if(is_null($value['sub']))
                            <li>
                                <a href="{{ route($value['route']) }}" class="flex items-center gap-x-1.5 px-2 py-1.5 text-sm font-medium text-slate-700 rounded hover:bg-gray-100 
                                    {{ request()->routeIs($value['prefix']) ? 'bg-gray-100 dark:bg-gray-900 dark:text-white' : 'dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300' }}
                                ">
                                    @if(isset($value['icon']))
                                        <Icon icon="{{ $value['icon'] }}" class="h-4 w-4" />
                                    @endif
                                    {{ ___($key) }}
                                </a>
                            </li>
                        @else 
                            @foreach($value['sub'] as $key1 => $value1)
                                @if($value1 == 'separator')
                                    <li><span class="text-gray-500 text-xs font-medium uppercase pl-1">{{ ___($key1) }}</span></li>
                                @else 
                                    <li>
                                        <a href="{{ route($value1['route']) }}" class="flex items-center gap-x-1.5 px-2 py-1.5 text-sm font-medium text-slate-700 rounded hover:bg-gray-100 
                                            {{ request()->routeIs($value1['prefix']) ? 'bg-gray-100 dark:bg-gray-900 dark:text-white' : 'dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300' }}
                                        ">
                                            @if(isset($value1['icon']))
                                                <Icon icon="{{ $value1['icon'] }}" class="h-4 w-4" />
                                            @endif
                                            {{ ___($key1) }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endguest
            </ul>
        </nav>
    </div>
</x-splade-toggle>
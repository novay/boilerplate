<header class="fixed flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-white bg-opacity-50 z-50 text-sm py-1 lg:py-1 dark:bg-gray-900 border-b dark:border-gray-700">
    <nav class="w-full mx-auto px-1 sm:flex sm:items-center sm:justify-between" aria-label="Global">
        <div class="flex flex-row items-center gap-0 overflow-x-auto sm:justify-end sm:mt-0 sm:pb-0 sm:overflow-x-visible">
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                <button type="button" class="text-sm hover:bg-gray-100 dark:hover:bg-gray-800 px-2 py-0.5 rounded font-bold text-gray-600 dark:text-gray-100">
                    {{ config('boilerplate.name') }}
                </button>
                <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] hs-dropdown-open:opacity-100 opacity-0 w-auto hidden z-10 !mt-[-6px] min-w-[10rem] bg-white shadow rounded-b p-1 dark:bg-gray-800 dark:border-gray-700 dark:divide-gray-700 backdrop-blur-sm z-50">
                    <div class="px-2">
                        <Link href="/">
                            <x-application-logo class="block h-10 w-auto my-3" />
                        </Link>
                        <p class="text-xs text-gray-500 dark:text-white mb-2">
                            {{ date('Y') }} &copy; {{ config('boilerplate.info.copyright') }}<br/>
                            {{ config('boilerplate.info.right') }}
                        </p>
                    </div>
                </div>
            </div>
            @auth
                <Link href="{{ route('panel.index') }}" class="text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-800 px-1.5 py-0.5 rounded 
                    {{ request()->routeIs('panel.index') ? config('boilerplate.color.primary') : 'text-gray-600 dark:text-gray-100' }}" 
                    {{ request()->routeIs('panel.index') ? 'aria-current="page"' : '' }}
                >
                    Beranda
                </Link>
                
                <div class="hs-dropdown relative inline-flex">
                    <button type="button" id="hs-dropdown-pengaturan" class="hs-dropdown-toggle inline-flex justify-center items-center align-middle gap-1 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-800 px-1.5 py-0.5 rounded 
                        {{ request()->routeIs('panel.users.*') ? config('boilerplate.color.primary') : 'text-gray-600 dark:text-gray-100' }}
                    ">
                        Pengaturan
                        <Icon icon="mingcute:down-fill" class="hs-dropdown-open:rotate-180 w-3 h-3 text-gray-600 dark:text-gray-100" />
                    </button>
                    <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] hs-dropdown-open:opacity-100 opacity-0 w-auto hidden z-10 !mt-[-6px] min-w-[10rem] bg-white shadow rounded-b p-1 dark:bg-gray-800 dark:border-gray-700 dark:divide-gray-700 backdrop-blur-sm z-50">
                        <div class="text-xs text-gray-300 px-2 dark:text-gray-600 font-medium pt-1 pb-0.5">
                            Pengaturan
                        </div>
                        <Link href="{{ route('panel.users.index') }}" class="flex items-center gap-x-1.5 py-1 px-2 rounded text-sm font-medium {{ request()->routeIs('panel.users.*') ? config('boilerplate.color.primary') : 'text-gray-600' }} hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-300">
                            Pengguna
                        </Link>
                    </div>
                </div>
            @endauth
        </div>
        <div class="flex flex-row items-center gap-1 overflow-x-auto sm:justify-end sm:mt-0 sm:pb-0 sm:overflow-x-visible">
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                <button type="button" class="flex items-center gap-1 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-800 px-1.5 py-0.5 rounded text-gray-600 dark:text-gray-100">
                    <Icon icon="mingcute:sun-line" class="hs-dark-mode-active:hidden block w-4 h-4" />
                    <Icon icon="mingcute:moon-stars-line" class="hs-dark-mode-active:block hidden w-4 h-4" />
                    Mode
                </button>
                <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] hs-dropdown-open:opacity-100 opacity-0 w-auto hidden z-10 !mt-[-6px] min-w-[10rem] bg-white shadow rounded-b p-1 dark:bg-gray-900 dark:border dark:border-gray-700 dark:divide-gray-700" aria-labelledby="hs-dropdown-pengaturan">
                    <Link href="javascript:;" data-hs-theme-click-value="auto" class="hs-auto-mode-active:bg-gray-100 flex items-center gap-x-1.5 py-1 px-2 rounded text-sm font-medium text-gray-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-300">
                        <Icon icon="fluent:dark-theme-24-filled" class="w-auto h-4" />
                        Otomatis
                    </Link>
                    <Link href="javascript:;" data-hs-theme-click-value="default" class="hs-default-mode-active:bg-gray-100 flex items-center gap-x-1.5 py-1 px-2 rounded text-sm font-medium text-gray-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-300">
                        <Icon icon="mingcute:sun-line" class="w-auto h-4" />
                        Terang
                    </Link>
                    <Link href="javascript:;" data-hs-theme-click-value="dark" class="hs-dark-mode-active:bg-gray-800 hs-dark-mode-active:text-gray-400 flex items-center gap-x-1.5 py-1 px-2 rounded text-sm font-medium text-gray-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-300">
                        <Icon icon="mingcute:moon-stars-line" class="w-auto h-4" />
                        Gelap
                    </Link>
                </div>
            </div>
            
            @auth 
                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                    <button type="button" class="flex items-center gap-1 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-800 px-1.5 py-0.5 rounded {{ request()->routeIs('panel.profile.*') ? config('boilerplate.color.primary') : 'text-gray-600 dark:text-gray-100' }}">
                        <img class="inline-block h-[1rem] w-[1rem] rounded-full ring-2 ring-white dark:ring-gray-700" src="{{ me()->photo_url }}" alt="">
                        <span>{{ me()->name }}</span>
                    </button>
                    <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] hs-dropdown-open:opacity-100 opacity-0 w-auto hidden z-10 !mt-[-6px] min-w-[10rem] bg-white shadow rounded-b p-1 dark:bg-gray-900 dark:border dark:border-gray-700 dark:divide-gray-700" aria-labelledby="hs-dropdown-pengaturan">
                        <Link href="{{ route('panel.profile.edit') }}" class="flex items-center gap-x-1.5 py-1 px-2 rounded text-sm font-medium {{ request()->routeIs('panel.profile.edit') ? config('boilerplate.color.primary') : 'text-gray-600' }} hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-300">
                            <Icon icon="mingcute:contacts-line" class="w-auto h-3" />
                            {{ __('Profile') }}
                        </Link>
                        <Link href="{{ route('logout') }}" method="POST" class="flex items-center gap-x-1.5 py-1 px-2 rounded text-sm font-medium text-gray-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-300">
                            <Icon icon="mingcute:delete-back-line" class="w-auto h-3" />
                            {{ __('Log Out') }}
                        </Link>
                    </div>
                </div>
            @else 
                @if(Route::has('login'))
                    @auth
                        <Link href="{{ url('/dashboard') }}" class="inline-flex justify-center items-center gap-x-2 text-center bg-violet-900 hover:bg-violet-700 border border-transparent text-white text-sm rounded-lg focus:outline-none focus:ring-2 focus:ring-violet-900 focus:ring-offset-2 focus:ring-offset-white transition py-2.5 px-3 dark:focus:ring-offset-gray-800">
                            Dashboard
                        </Link>
                    @else
                        <Link href="{{ route('login') }}" class="flex items-center gap-0.5 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-800 px-1.5 py-0.5 rounded {{ request()->routeIs('login') ? config('boilerplate.color.primary') : 'text-gray-600 dark:text-gray-100' }}">
                            <Icon icon="mingcute:open-door-line" class="w-auto h-4" />
                            Login
                        </Link>
                        @if(Route::has('register'))
                            <Link href="{{ route('register') }}" class="flex items-center gap-0.5 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-800 px-1.5 py-0.5 rounded {{ request()->routeIs('register') ? config('boilerplate.color.primary') : 'text-gray-600 dark:text-gray-100' }}">
                                Register
                            </Link>
                        @endif
                    @endauth
                @endif
                <div><Clock /></div>
            @endauth
        </div>
    </nav>
</header>

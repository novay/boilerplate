<header class="fixed flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-white bg-opacity-50 z-50 text-sm py-1 lg:py-1 dark:bg-gray-900 border-b dark:border-gray-700">
    <nav class="w-full mx-auto px-1 sm:flex sm:items-center sm:justify-between" aria-label="Global">
        <div class="flex flex-row items-center gap-0 overflow-x-auto sm:justify-end sm:mt-0 sm:pb-0 sm:overflow-x-visible">
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                <button id="hs-dropdown-with-header" type="button" class="text-sm hover:bg-gray-100 dark:hover:bg-gray-800 px-2 py-0.5 rounded font-bold
                    {{ request()->routeIs('expense::index') ? config('boilerplate.color.primary') : 'text-gray-600 dark:text-gray-100' }}
                " 
                    {{ request()->routeIs('expense::index') ? 'aria-current="page"' : '' }}
                >
                    {{ config('boilerplate.name') }}
                </button>
                <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] hs-dropdown-open:opacity-100 opacity-0 w-auto hidden z-10 !mt-[-6px] min-w-[10rem] bg-white shadow rounded-b p-1 dark:bg-gray-800 dark:border-gray-700 dark:divide-gray-700 backdrop-blur-sm z-50">
                    <div class="px-2">
                        <Link href="/">
                            <x-application-logo class="block h-10 w-auto my-3" />
                        </Link>
                        <p class="text-xs text-gray-500 dark:text-white mb-2">
                            Copyright {{ date('Y') }} &copy; {{ config('boilerplate.info.copyright') }}<br/>
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
                    <button type="button" id="hs-dropdown-pengaturan" class="hs-dropdown-toggle 
                        inline-flex justify-center items-center align-middle gap-1
                        text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-800 px-1.5 py-0.5 rounded
                        {{ request()->routeIs('panel.users.*') ? config('boilerplate.color.primary') : 'text-gray-600 dark:text-gray-100' }}
                    ">
                        Pengaturan
                        <svg class="hs-dropdown-open:rotate-180 w-2 h-2 text-gray-600 dark:text-gray-100" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
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
                    <svg class="hs-dark-mode-active:hidden block w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
                    </svg>
                    <svg class="hs-dark-mode-active:block hidden w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                    </svg>
                    Mode
                </button>
                <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] hs-dropdown-open:opacity-100 opacity-0 w-auto hidden z-10 !mt-[-6px] min-w-[10rem] bg-white shadow rounded-b p-1 dark:bg-gray-900 dark:border dark:border-gray-700 dark:divide-gray-700" aria-labelledby="hs-dropdown-pengaturan">
                    <Link href="javascript:;" data-hs-theme-click-value="auto" class="hs-auto-mode-active:bg-gray-100 flex items-center gap-x-1.5 py-1 px-2 rounded text-sm font-medium text-gray-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-300">
                        <Icon icon="fluent:dark-theme-24-filled" class="w-auto h-3" />
                        Otomatis
                    </Link>
                    <Link href="javascript:;" data-hs-theme-click-value="default" class="hs-default-mode-active:bg-gray-100 flex items-center gap-x-1.5 py-1 px-2 rounded text-sm font-medium text-gray-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-300">
                        <Icon icon="mingcute:sun-line" class="w-auto h-3" />
                        Terang
                    </Link>
                    <Link href="javascript:;" data-hs-theme-click-value="dark" class="hs-dark-mode-active:bg-gray-800 hs-dark-mode-active:text-gray-400 flex items-center gap-x-1.5 py-1 px-2 rounded text-sm font-medium text-gray-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-300">
                        <Icon icon="mingcute:moon-stars-line" class="w-auto h-3" />
                        Gelap
                    </Link>
                </div>
            </div>
            
            @auth 
                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                    <button id="hs-dropdown-with-header" type="button" class="flex items-center gap-1 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-800 px-1.5 py-0.5 rounded 
                        {{ request()->routeIs('expense::index') ? config('boilerplate.color.primary') : 'text-gray-600 dark:text-gray-100' }}
                    " 
                        {{ request()->routeIs('expense::index') ? 'aria-current="page"' : '' }}
                    >
                        <img class="inline-block h-[1rem] w-[1rem] rounded-full ring-2 ring-white dark:ring-gray-700" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="">
                        <span>Novianto Rahmadi</span>
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
            @endauth
            <div><Clock /></div>
        </div>
    </nav>
</header>

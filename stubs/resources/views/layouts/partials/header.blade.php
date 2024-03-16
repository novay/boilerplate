<header class="flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-white bg-opacity-50 z-[60] text-sm py-1 lg:py-1 dark:bg-gray-900 border-b dark:border-gray-700">
    <nav class="container mx-auto sm:flex sm:items-center sm:justify-between" aria-label="Global">
        <div class="flex flex-row items-center gap-0.5 overflow-x-auto sm:justify-end sm:mt-0 sm:pb-0 sm:overflow-x-visible">
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                <button id="hs-dropdown-with-header" type="button" class="text-sm hover:bg-gray-100 dark:hover:bg-gray-800 px-2 py-0.5 rounded font-bold
                    {{ request()->routeIs('expense::index') ? config('boilerplate.color.primary') : 'text-gray-600 dark:text-gray-100' }}
                ">
                    {{ config('boilerplate.name') }}
                </button>
                <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] hs-dropdown-open:opacity-100 opacity-0 w-auto hidden z-[60] !mt-[-6px] min-w-[10rem] bg-white shadow rounded-b p-1 dark:bg-gray-800 dark:border-gray-700 dark:divide-gray-700 backdrop-blur-sm z-50">
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
                @foreach(config('boilerplate.menu') as $key => $value)
                    @if(is_null($value['sub']))
                        <Link href="{{ route($value['route']) }}" class="flex items-center gap-1 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-800 px-1.5 py-0.5 rounded focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition-all 
                            {{ request()->routeIs($value['prefix']) ? config('boilerplate.color.primary') : 'text-gray-600 dark:text-gray-100' }}" 
                            {{ request()->routeIs($value['prefix']) ? 'aria-current="page"' : '' }}
                        >
                            @if(isset($value['icon']))
                                <Icon icon="{{ $value['icon'] }}" class="h-4 w-4" />
                            @endif
                            {{ ___($key) }}
                        </Link>
                    @else 
                        <div class="hs-dropdown relative inline-flex">
                            <button type="button" id="hs-dropdown-pengaturan" class="hs-dropdown-toggle inline-flex justify-center items-center align-middle gap-1 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-800 px-1.5 py-0.5 rounded focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition-all 
                                {{ request()->routeIs($value['prefix']) ? config('boilerplate.color.primary') : 'text-gray-600 dark:text-gray-100' }}
                            ">
                                @if(isset($value['icon']))
                                    <Icon icon="{{ $value['icon'] }}" class="h-4 w-4" />
                                @endif
                                {{ ___($key) }}
                                <svg class="hs-dropdown-open:rotate-180 w-2 h-2 text-gray-600 dark:text-gray-100" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </button>
                            <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] hs-dropdown-open:opacity-100 opacity-0 w-auto hidden z-10 !mt-[-6px] min-w-[10rem] bg-white shadow rounded-b p-1 dark:bg-gray-800 dark:border-gray-700 dark:divide-gray-700 backdrop-blur-sm z-50">
                                @foreach($value['sub'] as $key1 => $value1)
                                    @if($value1 == 'separator')
                                        <div class="text-xs text-gray-300 px-2 dark:text-gray-600 font-medium pt-1 pb-0.5">
                                            {{ ___($key1) }}
                                        </div>
                                    @else 
                                        <Link href="{{ route($value1['route']) }}" class="flex items-center gap-x-1.5 py-1 px-2 rounded text-sm font-medium hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-300
                                            {{ request()->routeIs($value1['prefix']) ? config('boilerplate.color.primary') : 'text-gray-600' }}
                                        ">
                                            @if(isset($value1['icon']))
                                                <Icon icon="{{ $value1['icon'] }}" class="h-4 w-4" />
                                            @endif
                                            {{ ___($key1) }}
                                        </Link>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            @else 
                @if(Route::has('login'))
                    @auth
                        <Link href="{{ url('/dashboard') }}" class="inline-flex justify-center items-center gap-x-2 text-center bg-violet-900 hover:bg-violet-700 border border-transparent text-white text-sm rounded-lg focus:outline-none focus:ring-2 focus:ring-violet-900 focus:ring-offset-2 focus:ring-offset-white transition py-2.5 px-3 dark:focus:ring-offset-gray-800">
                            {{ ___('Dashboard') }}
                        </Link>
                    @else
                        <Link href="{{ route('login') }}" modal class="flex items-center gap-1 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-800 px-1.5 py-0.5 rounded focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition-all  {{ request()->routeIs('login') ? config('boilerplate.color.primary') : 'text-gray-600 dark:text-gray-100' }}">
                            <Icon icon="tabler:login-2" class="w-4 h-4" />
                            {{ ___('Login') }}
                        </Link>
                        @if(config('boilerplate.settings.register'))
                            <Link href="{{ route('register') }}" modal class="flex items-center gap-1 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-800 px-1.5 py-0.5 rounded focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition-all  {{ request()->routeIs('register') ? config('boilerplate.color.primary') : 'text-gray-600 dark:text-gray-100' }}">
                                <Icon icon="tabler:user-plus" class="w-4 h-4" />
                                {{ ___('Register') }}
                            </Link>
                        @endif
                    @endauth
                @endif
            @endauth
        </div>
        <div class="flex flex-row items-center gap-2 overflow-x-auto sm:justify-end sm:mt-0 sm:pb-0 sm:overflow-x-visible">
            <div v-if="@js(config('boilerplate.settings.language'))" class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                <button type="button" class="flex items-center gap-1 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-800 px-1.5 py-0.5 rounded text-gray-600 dark:text-gray-100 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition-all">
                    <div v-if="@js(app()->getLocale() == 'id')" class="flex items-center gap-1">
                        <Icon icon="emojione:flag-for-indonesia" class="w-auto h-4" />
                        Indonesian (ID)
                    </div>
                    <div v-if="@js(app()->getLocale() == 'en')" class="flex items-center gap-1">
                        <Icon icon="emojione:flag-for-us-outlying-islands" class="w-auto h-4" />
                        English (US)
                    </div>
                </button>
                <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] hs-dropdown-open:opacity-100 opacity-0 w-auto hidden z-10 !mt-[-6px] min-w-[10rem] bg-white shadow rounded-b p-1 dark:bg-gray-900 dark:border dark:border-gray-700 dark:divide-gray-700" aria-labelledby="hs-dropdown-pengaturan">
                    @foreach(config('boilerplate.lang.available') as $key => $value)
                        <Link href="{{ route('lang') }}?lang={{ $key }}" method="POST" class="flex items-center gap-x-1.5 py-1 px-2 rounded text-sm font-medium text-gray-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-300">
                            <Icon v-if="@js($key == 'id')" icon="emojione:flag-for-indonesia" class="w-auto h-4" />
                            <Icon v-if="@js($key == 'en')" icon="emojione:flag-for-us-outlying-islands" class="w-auto h-4" />
                            {{ $value }}
                        </Link>
                    @endforeach
                </div>
            </div>
            <div v-if="@js(config('boilerplate.settings.darkmode'))" class="hs-dropdown text-sm font-medium text-gray-600 dark:text-gray-100">
                <button type="button" class="dark:flex hidden" @click.prevent="data.dark = !data.dark; $splade.refresh()">
                    <Icon icon="tabler:moon-stars" class="flex-shrink-0 w-5 h-5 text-gray-600 dark:text-gray-400 dark:hover:text-gray-500 me-1" /> 
                    Mode
                </button>
                <button type="button" class="dark:hidden flex" @click.prevent="data.dark = !data.dark; $splade.refresh()">
                    <Icon icon="tabler:sun" class="flex-shrink-0 w-5 h-5 text-gray-600 dark:text-gray-400 dark:hover:text-gray-500 me-1" /> 
                    Mode
                </button>
            </div>
            @auth 
                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                    <button id="hs-dropdown-with-header" type="button" class="flex items-center gap-1 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-800 px-1.5 py-0.5 rounded text-gray-600 dark:text-gray-100 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition-all">
                        <img class="inline-block h-[1rem] w-[1rem] rounded-full ring-2 ring-white dark:ring-gray-700" src="{{ me()->photo_url }}" alt="">
                        <span>{{ me()->name }}</span>
                    </button>
                    <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] hs-dropdown-open:opacity-100 opacity-0 w-auto hidden z-10 !mt-[-6px] min-w-[10rem] bg-white shadow rounded-b p-1 dark:bg-gray-900 dark:border dark:border-gray-700 dark:divide-gray-700" aria-labelledby="hs-dropdown-pengaturan">
                        <Link href="{{ route('panel.profile.edit') }}" class="flex items-center gap-x-1.5 py-1 px-2 rounded text-sm font-medium {{ request()->routeIs('panel.profile.edit') ? config('boilerplate.color.primary') : 'text-gray-600' }} hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-300">
                            <Icon icon="mingcute:contacts-line" class="w-auto h-4" />
                            {{ ___('Profil') }}
                        </Link>
                        <Link href="{{ route('logout') }}" method="POST" class="flex items-center gap-x-1.5 py-1 px-2 rounded text-sm font-medium text-gray-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-300">
                            <Icon icon="mingcute:delete-back-line" class="w-auto h-4" />
                            {{ ___('Logout') }}
                        </Link>
                    </div>
                </div>
            @else 
                <div><Clock /></div>
            @endauth
        </div>
    </nav>
</header>
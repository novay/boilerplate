<x-splade-toggle>
    <div class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 md:px-8 lg:hidden dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center py-4">
            <button type="button" class="text-gray-500 hover:text-gray-600" data-hs-overlay="#application-sidebar" aria-controls="application-sidebar" aria-label="Toggle navigation">
                <span class="sr-only">Toggle Navigation</span>
                <svg class="w-5 h-5" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </button>
        </div>
    </div>
    <div id="application-sidebar" class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 left-0 bottom-0 z-[60] w-56 bg-white border-r border-gray-200 pt-4 pb-0 overflow-y-auto scrollbar-y lg:block lg:translate-x-0 lg:right-auto lg:bottom-0 dark:scrollbar-y dark:bg-gray-800 dark:border-gray-700">
        <div class="px-6">
            <Link href="{{ route('panel.index') }}" class="flex-none text-xl font-semibold text-gray-400 dark:text-white">
                <x-application-logo class="block h-9 w-auto fill-current" />
            </Link>
        </div>
        <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
            <ul class="space-y-1">
                <li>
                    <x-splade-link :href="route('panel.index')" class="flex items-center gap-x-2 px-2.5 py-1.5 font-medium text-slate-700 rounded hover:bg-gray-100 {{ request()->routeIs('panel.index') ? 'bg-gray-100 dark:bg-gray-900 dark:text-white' : 'dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300' }}">
                        <Icon class="w-6 h-6" icon="solar:home-angle-line-duotone" />
                        Dashboard
                    </x-splade-link>
                </li>
                <li>
                    <x-splade-link :href="route('panel.users.index')" class="flex items-center gap-x-2 px-2.5 py-1.5 font-medium text-slate-700 rounded hover:bg-gray-100 {{ request()->routeIs('panel.users.*') ? 'bg-gray-100 dark:bg-gray-900 dark:text-white' : 'dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300' }}">
                        <Icon class="w-6 h-6" icon="solar:user-id-line-duotone" />
                        Users
                    </x-splade-link>
                </li>
                <li class="hs-accordion" id="users-accordion">
                    <a class="hs-accordion-toggle flex items-center gap-x-2 px-2.5 py-1.5 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent font-medium text-slate-700 rounded hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:hs-accordion-active:text-white" href="javascript:;">
                        <Icon class="w-6 h-6" icon="solar:bookmark-opened-line-duotone" />
                        Example
                        <Icon icon="solar:alt-arrow-up-line-duotone" class="hs-accordion-active:block ml-auto hidden w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-gray-400" />
                        <Icon icon="solar:alt-arrow-down-line-duotone" class="hs-accordion-active:hidden ml-auto block w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-gray-400" />
                    </a>
                    <div id="users-accordion-sub" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                        <ul class="hs-accordion-group pl-3 pt-2" data-hs-accordion-always-open>
                            <li>
                                <a class="flex items-center gap-x-2 px-2.5 py-1.5 text-sm font-medium text-slate-700 rounded hover:bg-gray-100 dark:bg-gray-800 dark:text-slate-400 dark:hover:text-slate-300" href="javascript:;">
                                    Link 1
                                </a>
                            </li>
                            <li class="hs-accordion" id="users-accordion-sub-2">
                                <a class="hs-accordion-toggle flex items-center gap-x-2 px-2.5 py-1.5 text-sm hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent font-medium text-slate-700 rounded hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:hs-accordion-active:text-white" href="javascript:;">
                                    Sub Menu 2
                                    <Icon icon="solar:alt-arrow-up-line-duotone" class="hs-accordion-active:block ml-auto hidden w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-gray-400" />
                                    <Icon icon="solar:alt-arrow-down-line-duotone" class="hs-accordion-active:hidden ml-auto block w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-gray-400" />
                                </a>
                                <div id="users-accordion-sub-2-child" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden pl-2">
                                    <ul class="pt-2 pl-2">
                                        <li>
                                            <a class="flex items-center gap-x-2 px-2.5 py-1.5 text-sm font-medium text-slate-700 rounded hover:bg-gray-100 dark:bg-gray-800 dark:text-slate-400 dark:hover:text-slate-300" href="javascript:;">
                                                Link 1
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center gap-x-2 px-2.5 py-1.5 text-sm font-medium text-slate-700 rounded hover:bg-gray-100 dark:bg-gray-800 dark:text-slate-400 dark:hover:text-slate-300" href="javascript:;">
                                                Link 2
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center gap-x-2 px-2.5 py-1.5 text-sm font-medium text-slate-700 rounded hover:bg-gray-100 dark:bg-gray-800 dark:text-slate-400 dark:hover:text-slate-300" href="javascript:;">
                                                Link 3
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</x-splade-toggle>

<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-sm overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
    <div class="w-full sm:max-w-md flex items-center justify-between mt-3">
        <div class="text-xs text-gray-500">
            Copyright &copy; {{ date('Y') }}
        </div>
        <div class="flex items-center gap-2">
            <div v-if="@js(config('boilerplate.settings.darkmode'))" class="hs-dropdown text-sm font-medium text-gray-600 dark:text-gray-100">
                <button type="button" class="dark:flex hidden" @click.prevent="data.dark = !data.dark; $splade.refresh()">
                    <Icon icon="tabler:moon-stars" class="flex-shrink-0 w-5 h-5 text-gray-600 dark:text-gray-400 dark:hover:text-gray-500 me-1" /> 
                </button>
                <button type="button" class="dark:hidden flex" @click.prevent="data.dark = !data.dark; $splade.refresh()">
                    <Icon icon="tabler:sun" class="flex-shrink-0 w-5 h-5 text-gray-600 dark:text-gray-400 dark:hover:text-gray-500 me-1" /> 
                </button>
            </div>
            <div v-if="@js(config('boilerplate.settings.language'))" class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                <button type="button" class="flex items-center gap-1 text-sm font-medium hover:bg-gray-50 dark:hover:bg-gray-800 px-2 py-1 rounded text-gray-600 dark:text-gray-100">
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
        </div>
    </div>
</div>
<div class="h-screen">
    <div class="transparent flex h-full">
        <div class="relative">
            <div aria-hidden="true" class="flex absolute -top-48 left-0 -z-[1]">
                <div class="bg-purple-200 opacity-30 blur-3xl w-[1036px] h-[600px] dark:bg-purple-900 dark:opacity-20"></div>
                <div class="bg-slate-200 opacity-90 blur-3xl w-[577px] h-[300px] transform translate-y-32 dark:bg-slate-800/60"></div>
            </div>
        </div>
        <div class="max-w-[75rem] flex flex-col mx-auto w-full h-full">
            <header class="mb-auto flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full text-sm py-4">
                <nav class="w-full px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8" aria-label="Global">
                    <div class="flex items-center justify-between">
                        <a class="flex-none text-xl font-semibold text-white" href="#" aria-label="">
                            <x-application-logo class="w-20 fill-current text-gray-500" />
                        </a>
                        <div class="sm:hidden">
                            <button type="button" class="hs-collapse-toggle p-2 inline-flex justify-center items-center gap-2 rounded-md border border-gray-700 hover:border-gray-600 font-medium text-gray-300 hover:text-white shadow-sm align-middle focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-900 focus:ring-blue-600 transition-all text-sm" data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                                <svg class="hs-collapse-open:hidden w-4 h-4" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                                <svg class="hs-collapse-open:block hidden w-4 h-4" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div id="navbar-collapse-with-animation" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
                        <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:pl-5">
                            @if (Route::has('login'))
                                @auth
                                    <Link href="{{ url('/dashboard') }}" class="inline-flex justify-center items-center gap-x-2 text-center bg-violet-900 hover:bg-violet-700 border border-transparent text-white text-sm rounded-lg focus:outline-none focus:ring-2 focus:ring-violet-900 focus:ring-offset-2 focus:ring-offset-white transition py-2.5 px-3 dark:focus:ring-offset-gray-800">
                                        Dashboard
                                    </Link>
                                @else
                                    <Link href="{{ route('login') }}" class="font-medium text-gray-600 hover:text-gray-500 py-3 md:py-6 dark:text-gray-400 dark:hover:text-gray-500">
                                        Log in
                                    </Link>
                                    @if (Route::has('register'))
                                        <Link href="{{ route('register') }}" class="inline-flex justify-center items-center gap-x-2 text-center bg-violet-900 hover:bg-violet-700 border border-transparent text-white text-sm rounded-lg focus:outline-none focus:ring-2 focus:ring-violet-900 focus:ring-offset-2 focus:ring-offset-white transition py-2.5 px-3 dark:focus:ring-offset-gray-800">
                                            Register
                                        </Link>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </nav>
            </header>
            <main id="content" role="main">
                <div class="text-center py-10 px-4 sm:px-6 lg:px-8">
                    <div class="max-w-5xl mx-auto text-center mb-10">
                        <h2 class="text-3xl leading-tight font-bold md:text-4xl md:leading-tight lg:text-7xl lg:leading-tight bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-700 text-transparent">
                            Laravel + Tailwind Boilerplate
                        </h2>
                        <p class="mt-2 lg:text-lg text-gray-800 dark:text-gray-200">Whatever our status, we needs evolve according to our needs.</p>
                    </div>
                    <div class="mt-5 flex flex-col justify-center items-center gap-2 sm:flex-row sm:gap-3">
                        <a href="https://github.com/novay/boilerplate" class="w-full sm:w-auto inline-flex justify-center items-center gap-x-3.5 text-center border border-1 border-gray-600 shadow-sm text-sm font-medium rounded-md hover:text-blue-600 hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-gray-800 transition py-3 px-4" target="_blank">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                            </svg>
                            Get the source code
                        </a>
                    </div>
                </div>
            </main>
            <footer class="mt-auto text-center py-5">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-gray-600 hover:text-gray-500 py-3 md:py-6 dark:text-gray-400">
                        Open Source colaboration from <a href="https://iconify.design" class="text-gray-600 decoration-2 underline underline-offset-2 font-medium hover:text-gray-400 hover:decoration-gray-400" target="_blank">Iconify</a>, <a href="https://preline.co" class="text-gray-600 decoration-2 underline underline-offset-2 font-medium hover:text-gray-400 hover:decoration-gray-400" target="_blank">Preline</a> and <a href="https://splade.dev/" class="text-gray-600 decoration-2 underline underline-offset-2 font-medium hover:text-gray-400 hover:decoration-gray-400" target="_blank">Laravel Splade</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
</div>
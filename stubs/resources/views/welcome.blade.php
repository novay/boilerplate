@seoTitle('Welcome')
<x-app-layout>
    <div class="transparent flex h-full">
        <div class="relative">
            <div aria-hidden="true" class="flex absolute -top-48 left-0 -z-[1]">
                <div class="bg-purple-200 opacity-30 blur-3xl w-[1036px] h-[600px] dark:bg-purple-900 dark:opacity-20"></div>
                <div class="bg-slate-200 opacity-90 blur-3xl w-[577px] h-[300px] transform translate-y-32 dark:bg-slate-800/60"></div>
            </div>
        </div>
        <div class="max-w-[75rem] flex flex-col mx-auto w-full h-full">
            <header class="mb-auto"></header>
            <main id="content" role="main">
                <div class="text-center py-10 px-4 sm:px-6 lg:px-8">
                    <div class="max-w-5xl mx-auto text-center my-10">
                        <h2 class="text-3xl leading-tight font-bold md:text-4xl md:leading-tight lg:text-7xl lg:leading-tight bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-700 text-transparent">
                            Laravel + Tailwind Boilerplate
                        </h2>
                        <p class="mt-2 lg:text-xl text-gray-800 dark:text-gray-200">
                            Whatever our status, we needs evolve according to our needs.
                        </p>
                    </div>
                    <div class="mt-5">
                        <a href="https://github.com/novay/boilerplate" class="w-full sm:w-auto inline-flex justify-center items-center gap-x-2.5 text-center border border-1 border-gray-600 shadow-sm text-sm font-medium rounded-md hover:text-blue-600 hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-gray-800 transition py-3 px-4 dark:text-white" target="_blank">
                            <Icon class="w-4 h-4" icon="codicon:github-inverted" />
                            Get the source code
                        </a>
                    </div>
                </div>
            </main>
            <footer class="mt-auto text-center py-5">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-gray-600 hover:text-gray-500 py-3 md:py-6 dark:text-gray-400">
                        Open Source colaboration from <a href="https://iconify.design" class="text-gray-600 decoration-2 underline underline-offset-2 font-medium hover:text-gray-400 hover:decoration-gray-400 dark:text-white" target="_blank">Iconify</a>, <a href="https://preline.co" class="text-gray-600 decoration-2 underline underline-offset-2 font-medium hover:text-gray-400 hover:decoration-gray-400 dark:text-white" target="_blank">Preline</a> and <a href="https://splade.dev/" class="text-gray-600 decoration-2 underline underline-offset-2 font-medium hover:text-gray-400 hover:decoration-gray-400 dark:text-white" target="_blank">Laravel Splade</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
</x-app-layout>
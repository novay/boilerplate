@seoTitle(___('Selamat Datang'))
<x-app-layout>
    <div class="container flex flex-col mx-auto w-full lg:h-[calc(100vh_-_75px)] px-4 lg:px-0">
        <header class="mb-auto"></header>
        <main id="content" role="main">
            <div class="text-start py-6">
                <div class="mx-auto my-10">
                    <div class="mt-3 mb-2">
                        <x-application-logo class="w-20 h-20 lg:w-32 lg:h-32 fill-current text-gray-500" />
                    </div>
                    <h2 class="text-5xl leading-tight font-bold md:text-4xl md:leading-tight lg:text-7xl tracking-tight lg:leading-tight bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-700 text-transparent">
                        {{ config('boilerplate.name') }}
                    </h2>
                    <p class="mt-1 text-xl lg:text-3xl font-light text-slate-600 dark:text-slate-200">
                        {{ ___(config('boilerplate.description')) }}
                    </p>
                    <div class="mt-10">
                        <a href="https://github.com/novay/boilerplate" class="w-full sm:w-auto inline-flex justify-center items-center gap-x-2.5 text-center border border-1 border-gray-300 font-medium rounded-md hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-gray-800 transition py-3 px-4 dark:text-white bg-white dark:bg-slate-900 dark:border-slate-700" target="_blank">
                            <Icon class="w-4 h-4 lg:w-5 lg:h-5" icon="codicon:github-inverted" />
                            Get the source code
                        </a>
                    </div>
                </div>
            </div>
        </main>
        <footer class="max-w-7xl mt-auto pt-5">
            <p class="text-sm text-gray-400 py-3 md:py-6 dark:text-gray-400">
                Open Source colaboration from <a href="https://iconify.design" class="text-gray-600 decoration-2 underline underline-offset-2 font-medium hover:text-gray-700 hover:decoration-gray-700 dark:text-white" target="_blank">Iconify</a>, <a href="https://preline.co" class="text-gray-600 decoration-2 underline underline-offset-2 font-medium hover:text-gray-700 hover:decoration-gray-700 dark:text-white" target="_blank">Preline</a> and <a href="https://splade.dev/" class="text-gray-600 decoration-2 underline underline-offset-2 font-medium hover:text-gray-700 hover:decoration-gray-700 dark:text-white" target="_blank">Laravel Splade</a>
            </p>
        </footer>
    </div>
</x-app-layout>
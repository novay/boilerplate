@seoTitle('Dashboard')
<x-app-layout>
    <div class="w-full px-3 pt-0 md:pt-8">
        <header class="py-5">
            <p class="mb-2 text-sm font-semibold {{ config('boilerplate.color.primary') }}">
                Starter Pages & Examples
            </p>
            <h1 class="block text-4xl font-bold text-gray-800 dark:text-white">
                Welcome to your Boilerplate Project
            </h1>
            <p class="mt-2 text-lg text-gray-800 dark:text-gray-400">
                This is a simple application layout examples using Tailwind CSS.
            </p>
            <div class="mt-5 flex flex-col items-center gap-2 sm:flex-row sm:gap-3">
                <a href="https://github.com/novay/boilerplate" target="_blank" class="w-full sm:w-auto inline-flex justify-center items-center gap-x-2 text-center bg-indigo-600 hover:bg-indigo-700 border border-transparent text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 focus:ring-offset-white transition py-2 px-3 dark:focus:ring-offset-gray-800">
                    <Icon class="w-4 h-4" icon="codicon:github-inverted" />
                    Get the source code
                </a>
            </div>
        </header>
    </div>
</x-app-layout>

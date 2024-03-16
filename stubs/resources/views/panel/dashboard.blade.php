@seoTitle('Dashboard')
<x-app-layout>
    <header class="border rounded lg:rounded-xl p-5 lg:p-10 bg-white dark:bg-slate-950 dark:border-slate-900 shadow-sm">
        <p class="mb-2 text-sm lg:text-lg font-semibold {{ config('boilerplate.color.primary') }}">
            Starter Pages & Examples
        </p>
        <h1 class="block text-3xl lg:text-5xl font-extrabold tracking-tight text-gray-700 dark:text-white">
            Welcome to your Boilerplate Project
        </h1>
        <p class="mt-2 text-lg lg:text-2xl font-light text-gray-600 dark:text-gray-400">
            This is a simple application layout examples using Tailwind CSS.
        </p>
        <div class="mt-10 flex flex-col items-center gap-2 sm:flex-row sm:gap-3">
            <a href="https://github.com/novay/boilerplate" target="_blank" class="w-full sm:w-auto inline-flex justify-center items-center gap-x-2 text-center bg-indigo-600 hover:bg-indigo-700 border border-transparent text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 focus:ring-offset-white transition py-2 px-3 dark:focus:ring-offset-gray-800">
                <Icon class="w-4 h-4" icon="codicon:github-inverted" />
                Get the source code
            </a>
        </div>
    </header>

</x-app-layout>

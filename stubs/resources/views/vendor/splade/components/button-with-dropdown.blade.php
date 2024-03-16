<x-splade-component is="dropdown" {{ $attributes->class('py-1.5 px-3 inline-flex justify-center items-center gap-1.5 rounded border font-medium bg-white text-gray-700 align-middle hover:bg-gray-50 focus:z-10 focus:bg-gray-50 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400') }}>
    <x-slot:trigger>
        {{ $button }}
    </x-slot:trigger>

    <div class="mt-1 min-w-max rounded shadow bg-white ring-1 ring-black ring-opacity-5">
        {{ $slot }}
    </div>
</x-splade-component>

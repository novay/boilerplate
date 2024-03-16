<x-splade-data remember="panel" local-storage :default="[
    'dark' => false
]">
    <div :class="{'dark': data.dark}">
        <div class="min-h-screen bg-gray-100 dark:bg-slate-900 flex-col">
            {{ $slot }}
        </div>
    </div>
</x-splade-data>
<x-splade-component is="button-with-dropdown" dusk="bulk-actions-exports-dropdown" v-bind:close-on-click="true">
    <x-slot:button>
        <Icon icon="mingcute:more-1-fill" class="h-5 w-5 text-gray-400" />
    </x-slot:button>

    <div class="min-w-max w-48 rounded bg-white ring-1 ring-black ring-opacity-5">
        <div class="flex flex-col p-2">
            <span v-if="table.hasSelectedItems" class="block pt-2 mb-1 px-2 text-xs font-medium uppercase text-gray-400 dark:text-gray-500">
                <span v-if="table.totalSelectedItems == 1">
                    <span v-text="table.totalSelectedItems" /> {{ __('Item selected') }}
                </span>

                <span v-if="table.totalSelectedItems > 1">
                    <span v-text="table.totalSelectedItems" /> {{ __('Items selected') }}
                </span>
            </span>

            @foreach($table->getBulkActions() as $bulkAction)
                <button
                    v-if="table.hasSelectedItems"
                    class="flex items-center gap-x-1.5 py-1.5 px-2.5 rounded-md text-sm font-medium text-red-600 hover:bg-red-100 focus:ring-2 focus:ring-blue-500 dark:text-red-400 dark:hover:bg-red-700 dark:hover:text-red-300"
                    @click.prevent="table.performBulkAction(
                        @js($bulkAction->getUrl()),
                        @js($bulkAction->confirm),
                        @js($bulkAction->confirmText),
                        @js($bulkAction->confirmButton),
                        @js($bulkAction->cancelButton),
                        @js($bulkAction->requirePassword)
                    )"
                    dusk="action.{{ $bulkAction->getSlug() }}">
                    <Icon icon="mingcute:delete-line" class="h-4 w-4 text-red-500" />
                    {{ __($bulkAction->label) }}
                </button>
            @endforeach

            @if($table->hasExports() && $table->hasBulkActions())
                <div v-if="table.hasSelectedItems" class="mt-2 w-full"></div>
            @endif

            @if($table->hasExports())
                <span class="block pt-2 mb-1 px-2 text-xs font-medium uppercase text-gray-400 dark:text-gray-500">
                    {{ __('Export results') }}
                </span>
            @endif

            @foreach($table->getExports() as $export)
                <a download
                    class="flex items-center gap-x-1.5 py-1.5 px-2.5 rounded-md text-sm font-medium text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                    href="{{ $export->getUrl() }}"
                    dusk="action.{{ $export->getSlug() }}">
                    <Icon icon="ph:file-xls" class="h-4 w-4 text-gray-500" />
                    {{ $export->label }}
                </a>
            @endforeach
        </div>
    </div>
</x-splade-component>
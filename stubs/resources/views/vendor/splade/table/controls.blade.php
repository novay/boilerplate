<div class="flex gap-1 mb-3">
    <div class="inline-flex rounded-md shadow-sm">
        @stack('button')
        @if($table->hasExports() || $table->hasBulkActions())
            <div v-if="table.hasSelectedItems || @js($table->hasExports())">
                @include('splade::table.bulk-actions-exports')
            </div>
        @endif
    </div>

    <div class="flex-auto">
        @if($table->searchInputs('global'))
            @include('splade::table.global-search')
        @endif
    </div>

    <div class="inline-flex rounded-md shadow-sm">
        @if($table->hasToggleableColumns())
            <button
                v-show="@js($canResetTable()) || table.columnsAreToggled || table.hasForcedVisibleSearchInputs"
                type="button"
                class="py-1.5 px-3 inline-flex justify-center items-center gap-1.5 rounded border font-medium bg-white text-gray-700 align-middle hover:bg-gray-50 focus:z-10 focus:bg-gray-50 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400"
                @click.prevent="table.reset"
                dusk="reset-table"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
                <span class="hidden sm:inline">{{ __('Reset') }}</span>
            </button>
        @endif
        @if($table->hasToggleableSearchInputs())
            @include('splade::table.add-search-row')
        @endif
        @if($table->hasFilters())
            @include('splade::table.filters')
        @endif
        @if($table->hasToggleableColumns())
            @include('splade::table.columns')
        @endif
    </div>
</div>
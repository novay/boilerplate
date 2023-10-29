<div class="relative">
    <input
      autocomplete="off"
      class="block py-1.5 w-full rounded sm:pl-9 text-sm focus:ring-gray-200 focus:border-gray-200 border-gray-200 dark:bg-gray-800 dark:border-gray-700 dark:text-white"
      placeholder="{{ $table->searchInputs('global')->label }}"
      value="{{ $table->searchInputs('global')->value }}"
      type="text"
      name="searchInput-global"
      v-bind:class="{ 'opacity-50': table.isLoading }"
      v-bind:disabled="table.isLoading"
      @input="table.debounceUpdateQuery('filter[global]', $event.target.value, $event.target)"
    >
    <div class="absolute inset-y-0 left-0 pl-3 hidden sm:flex items-center pointer-events-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
        </svg>
    </div>
</div>
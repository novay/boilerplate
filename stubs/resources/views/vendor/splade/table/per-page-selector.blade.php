<select
    name="per_page"
    class="block focus:ring-{{ config('boilerplate.color.label') }}-500 focus:border-{{ config('boilerplate.color.label') }}-500 min-w-max text-sm border-gray-200 dark:text-white dark:bg-gray-800 dark:border-gray-800 rounded py-1.5 pl-2 pr-7"
    @change="table.updateQuery('perPage', $event.target.value)"
  >
    @foreach($table->allPerPageOptions() as $perPage)
        <option value="{{ $perPage }}" @selected($perPage === $table->perPage())>
            {{ $perPage }} {{ __('per page') }}
        </option>
    @endforeach
</select>
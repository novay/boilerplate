<thead class="bg-gray-50 dark:bg-slate-900">
    <tr>
        @if($hasBulkActions = $table->hasBulkActions())
            <th width="32" class="px-2 py-2 text-xs">
                @include('splade::table.select-rows-dropdown')
            </th>
        @endif

        @foreach($table->columns() as $column)
            <th
                v-show="table.columnIsVisible(@js($column->key))"
                class="@if($loop->first && $hasBulkActions) px-2 @else px-2 @endif py-2.5 text-left border-l dark:border-gray-700 text-xs font-medium tracking-wide text-gray-500 {{ $column->classes }}"
            >
                @if($column->sortable)
                    <a @click.exact.prevent="table.navigate(@js($sortByUrl = $sortBy($column)))" dusk="sort-{{ $column->key }}" href="{{ $sortByUrl }}">
                @endif

                <span class="flex flex-row items-center @if($column->alignment == 'right') justify-end @elseif($column->alignment == 'center') justify-center @else justify-start @endif">
                    <span class="uppercase">{{ $column->label }}</span>

                    @if($column->sortable)
                        <svg aria-hidden="true" class="w-3 h-3 ml-2 @if($column->sorted) text-{{ config('boilerplate.color.label') }}-500 @else text-gray-400 @endif" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            @if(!$column->sorted)
                                <path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z" />
                            @elseif($column->sorted === 'asc')
                                <path fill="currentColor" d="M279 224H41c-21.4 0-32.1-25.9-17-41L143 64c9.4-9.4 24.6-9.4 33.9 0l119 119c15.2 15.1 4.5 41-16.9 41z" />
                            @elseif($column->sorted === 'desc')
                                <path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z" />
                            @endif
                        </svg>
                    @endif
                </span>

                @if($column->sortable)
                    </a>
                @endif
            </th>
        @endforeach
    </tr>
</thead>
<tbody class="divide-y divide-gray-200 bg-white dark:bg-gray-800 dark:divide-gray-900">
    @forelse($table->resource as $itemKey => $item)
        <tr
            :class="{
                'bg-gray-50 dark:bg-gray-900': table.striped && @js($itemKey) % 2,
                'hover:bg-gray-100 dark:hover:bg-gray-800': table.striped,
                'hover:bg-gray-50 dark:hover:bg-gray-800': !table.striped
            }"
        >
            @if($hasBulkActions = $table->hasBulkActions())
                <td width="32" class="text-xs px-2 py-2 pt-2.5 align-top">
                    @php $itemPrimaryKey = $table->findPrimaryKey($item) @endphp

                    <input
                        @change="(e) => table.setSelectedItem(@js($itemPrimaryKey), e.target.checked)"
                        :checked="table.itemIsSelected(@js($itemPrimaryKey))"
                        :disabled="table.allItemsFromAllPagesAreSelected"
                        class="rounded border-gray-300 dark:border-gray-900 text-{{ config('boilerplate.color.label') }}-600 shadow-sm focus:border-{{ config('boilerplate.color.label') }}-300 focus:ring focus:ring-{{ config('boilerplate.color.label') }}-200 focus:ring-opacity-50 disabled:opacity-50"
                        name="table-row-bulk-action"
                        type="checkbox"
                        value="{{ $itemPrimaryKey }}"
                    />
                </td>
            @endif

            @foreach($table->columns() as $column)
                <td
                    @if($table->rowLinks->has($itemKey))
                        @click="(event) => table.visit(@js($table->rowLinks->get($itemKey)), @js($table->rowLinkType), event)"
                    @endif
                    v-show="table.columnIsVisible(@js($column->key))"
                    class="text-sm font-medium border-l text-gray-600 dark:text-gray-200 dark:border-gray-700 @if($loop->first && $hasBulkActions) pl-2 @else px-2 @endif py-2 pt-2 @if($column->highlight) text-gray-900 font-medium @else text-gray-500 @endif @if($table->rowLinks->has($itemKey)) cursor-pointer @endif {{ $column->classes }}"
                    width="{{ isset($column->width) ?? '' }}"
                >
                    <div class="flex flex-row items-center @if($column->alignment == 'right') justify-end @elseif($column->alignment == 'center') justify-center @else justify-start @endif">
                        @isset(${'spladeTableCell' . $column->keyHash()})
                            {{ ${'spladeTableCell' . $column->keyHash()}($item, $itemKey) }}
                        @else
                            {!! nl2br(e($getColumnDataFromItem($item, $column))) !!}
                        @endisset
                    </div>
                </td>
            @endforeach
        </tr>
    @empty
        <tr>
            <td colspan="{{ $table->columns()->count() }}" class="whitespace-nowrap">
                @if(isset($emptyState) && !!$emptyState)
                    {{ $emptyState }}
                @else
                    <p class="text-gray-700 px-6 py-12 font-medium text-center dark:text-white">
                        {{ __('There are no items to show.') }}
                    </p>
                @endif
            </td>
        </tr>
    @endforelse
</tbody>

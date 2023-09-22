<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between px-3 sm:px-0 py-3">
    <div class="flex justify-between flex-1 md:hidden">
        @if ($paginator->onFirstPage())
            <span class="relative inline-flex items-center px-3 py-1.5 text-xs sm:text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a @click.exact.prevent="table.navigate(@js($paginationUrl = $paginator->previousPageUrl()), true)" dusk="pagination-simple-previous" href="{{ $paginationUrl }}" class="relative inline-flex items-center px-3 py-1.5 text-xs sm:text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        @includeWhen($hasPerPageOptions ?? true, 'splade::table.per-page-selector')

        @if ($paginator->hasMorePages())
            <a @click.exact.prevent="table.navigate(@js($paginationUrl = $paginator->nextPageUrl()), true)" dusk="pagination-simple-next" href="{{ $paginationUrl }}" class="relative inline-flex items-center px-3 py-1.5 ml-3 text-xs sm:text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="relative inline-flex items-center px-3 py-1.5 text-xs sm:text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </div>

    <div class="hidden md:flex-1 md:flex md:items-center md:justify-between">
        <div class="flex items-center">
            @includeWhen($hasPerPageOptions ?? true, 'splade::table.per-page-selector')

            <div class="hidden lg:block @if($hasPerPageOptions ?? true) ml-3 @endif">
                <p class="text-xs sm:text-sm text-gray-700 dark:text-gray-400 leading-5">
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>
        </div>

        <div>
            <span class="relative z-0 inline-flex rounded">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                        <span class="relative inline-flex items-center px-2 py-1.5 text-xs sm:text-sm font-medium text-gray-500 bg-white dark:bg-gray-700 dark:border-gray-700 border border-gray-300 cursor-default rounded-l leading-5" aria-hidden="true">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </span>
                @else
                    <a @click.exact.prevent="table.navigate(@js($paginationUrl = $paginator->previousPageUrl()), true)" dusk="pagination-previous" href="{{ $paginationUrl }}" rel="prev" class="relative inline-flex items-center px-2 py-1.5 text-xs sm:text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span aria-disabled="true">
                            <span class="relative inline-flex items-center px-3 py-1.5 -ml-px text-xs sm:text-sm font-medium text-gray-700 bg-white dark:bg-gray-700 dark:border-gray-700 border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                        </span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page">
                                    <span class="relative inline-flex items-center px-3 py-1.5 -ml-px text-xs sm:text-sm font-medium bg-indigo-50 border-indigo-500 text-indigo-600 dark:bg-gray-700 dark:border-gray-700 dark:text-white z-10 border cursor-default leading-5">{{ $page }}</span>
                                </span>
                            @else
                                <a @click.exact.prevent="table.navigate(@js($url), true)" dusk="pagination-{{ $page }}" href="{{ $url }}" class="relative inline-flex items-center px-3 py-1.5 -ml-px text-xs sm:text-sm font-medium text-gray-700 bg-white dark:bg-gray-700 dark:border-gray-700 border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a @click.exact.prevent="table.navigate(@js($paginationUrl = $paginator->nextPageUrl()), true)" dusk="pagination-next" href="{{ $paginationUrl }}" rel="next" class="relative inline-flex items-center px-2 py-1.5 -ml-px text-xs sm:text-sm font-medium text-gray-500 bg-white dark:bg-gray-700 dark:border-gray-700 border border-gray-300 rounded-r leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @else
                    <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                        <span class="relative inline-flex items-center px-2 py-1.5 -ml-px text-xs sm:text-sm font-medium text-gray-500 bg-white dark:bg-gray-700 dark:border-gray-700 border border-gray-300 cursor-default rounded-r leading-5" aria-hidden="true">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </span>
                @endif
            </span>
        </div>
    </div>
</nav>
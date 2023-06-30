@props(['route' => null, 'label' => null, 'modal' => null, 'slideover' => null])

<Link href="{{ $route }}" {{ !is_null($modal) ? 'modal' : '' }} {{ !is_null($slideover) ? 'slideover' : '' }} class="py-2 px-3 mr-1 inline-flex justify-center items-center gap-1 rounded border text-sm font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
    {!! $label !!}
</Link>
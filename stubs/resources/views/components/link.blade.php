@props(['route' => null, 'label' => null, 'modal' => null, 'slideover' => null])

<Link href="{{ $route }}" {{ !is_null($modal) ? 'modal' : '' }} {{ !is_null($slideover) ? 'slideover' : '' }} class="py-1.5 px-3 inline-flex justify-center items-center gap-2 rounded border font-medium bg-white text-gray-700 align-middle hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-2 focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400">
    {!! $label !!}
</Link>
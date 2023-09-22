@seoTitle($title)
<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb>
            <x-breadcrumb-item href="javascript:;">{{ __('Pengaturan') }}</x-breadcrumb-item>
            <x-breadcrumb-item>{{ $title }}</x-breadcrumb-item>
        </x-breadcrumb>
    </x-slot>
    <div class="w-full p-2">
        <x-splade-lazy>
            <x-slot:placeholder><x-skeleton /></x-slot:placeholder>
            <x-splade-table :for="$table" search-debounce="500" striped>
                @push('button')
                    <x-link label="{{ __('+ Tambah') }}" route="{{ route($prefix.'.create') }}" modal></x-link>
                @endpush
                <x-splade-cell action use="$prefix">
                    <Link class="font-semibold text-green-600 hover:text-green-400 me-2"
                        href="{{ route($prefix.'.edit', $item->id) }}">
                        Edit 
                    </Link>
                    <Link class="font-semibold text-red-600 hover:text-red-400"
                        href="{{ route($prefix.'.destroy', $item->id) }}"
                        confirm="Delete Data" 
                        confirm-text="Are you sure?" 
                        confirm-button="Yes"
                        cancel-button="Cancel"
                        method="DELETE">
                        Delete
                    </Link>
                </x-splade-cell>
            </x-splade-table>
        </x-splade-lazy>
    </div>
</x-app-layout>
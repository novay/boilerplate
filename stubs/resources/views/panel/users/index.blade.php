@seoTitle($title)
<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb>
            <x-breadcrumb-item href="javascript:;">{{ ___('Konfigurasi') }}</x-breadcrumb-item>
            <x-breadcrumb-item>{{ $title }}</x-breadcrumb-item>
        </x-breadcrumb>
    </x-slot>
    <x-splade-lazy>
        <x-slot:placeholder><x-skeleton /></x-slot:placeholder>
        <x-splade-table :for="$table" search-debounce="500" striped>
            @push('button')
                <x-link label="{{ ___('+ Tambah') }}" route="{{ route($prefix.'.create') }}" modal></x-link>
            @endpush
            <x-splade-cell email>
                <span class="flex items-center gap-1 font-medium underline">
                    {{ $item->email }}
                    <a href="mailto:{{ $item->email }}" target="_blank">
                        <Icon icon="tabler:external-link" class="w-4 h-4" />
                    </a>
                </span>
            </x-splade-cell>
            <x-splade-cell password>
                @if($item->plain)
                    <span v-tippy="'{{ decrypt($item->plain) }}'" class="flex items-center gap-1 cursor-pointer">
                        <Icon icon="tabler:copy" class="w-4 h-4" />
                        &bull;&bull;&bull;&bull;&bull;
                    </span>
                @endif
            </x-splade-cell>
            <x-splade-cell phone>
                @if($item->phone)
                    <span class="flex items-center gap-1 underline">
                        +62{{ $item->phone }}
                        <a href="tel:62{{ $item->phone }}" target="_blank" class="mt-[-1px]">
                            <Icon icon="tabler:external-link" class="w-4 h-4" />
                        </a>
                    </span>
                @else 
                    -
                @endif
            </x-splade-cell>
            <x-splade-cell action use="$prefix">
                <div class="flex items-center gap-2">
                    <Link href="{{ route($prefix.'.edit', $item->id) }}" modal class="flex items-center gap-0.5 font-semibold text-green-600 hover:text-green-700">
                        <Icon icon="tabler:edit" class="w-4 h-4" />
                        {{ ___('Sunting') }} 
                    </Link>
                    <Link class="flex items-center gap-0.5 font-semibold text-red-600 hover:text-red-700"
                        v-tippy="'{{ ___('Delete') }} '"
                        href="{{ route($prefix.'.destroy', $item->id) }}"
                        confirm="{{ ___('Perhatian') }}" 
                        confirm-text="{{ ___('Kamu yakin akan menghapus data ini?') }}" 
                        confirm-button="{{ ___('Yes') }}"
                        cancel-button="{{ ___('Batalkan') }}"
                        confirm-danger
                        method="DELETE">
                        <Icon icon="tabler:trash" class="w-4 h-4" />
                    </Link>
                </div>
            </x-splade-cell>
        </x-splade-table>
    </x-splade-lazy>
</x-app-layout>
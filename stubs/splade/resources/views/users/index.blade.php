@seoTitle($title)
<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :create="route($prefix.'.create')">
            <x-breadcrumb-item>{{ $title }}</x-breadcrumb-item>
        </x-breadcrumb>
    </x-slot>
    <div class="w-full pt-4 px-4 sm:px-6 md:px-8 lg:pl-72">
        <x-splade-table :for="$users" search-debounce="500">
            @cell('action', $user)
                <Link class="font-semibold text-green-600 hover:text-green-400 me-2"
                    href="{{ route('users.edit', $user->id) }}">
                    Edit 
                </Link>
                <Link class="font-semibold text-red-600 hover:text-red-400"
                    href="{{ route('users.destroy', $user->id) }}"
                    confirm="Delete Data" 
                    confirm-text="Are you sure?" 
                    confirm-button="Yes"
                    cancel-button="Cancel"
                    method="DELETE">
                    Delete
                </Link>
            @endcell
        </x-splade-table>
    </div>
</x-app-layout>
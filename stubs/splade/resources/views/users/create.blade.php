@seoTitle("Create :: {$title}")
<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :back="route($prefix.'.index')">
            <x-breadcrumb-item :href="route($prefix.'.index')">{{ $title }}</x-breadcrumb-item>
            <x-breadcrumb-item>Create</x-breadcrumb-item>
        </x-breadcrumb>
    </x-slot>
    <div class="w-full pt-4 px-4 sm:px-6 md:px-8 lg:pl-72">
        <x-splade-form :action="route($prefix.'.store')" class="space-y-4">
            @include("$view.form")
        </x-splade-form>
    </div>
</x-app-layout>
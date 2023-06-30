@seoTitle(__($subtitle).' :: '.__($title))
<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :back="route($prefix.'.index')">
            <x-breadcrumb-item :href="route($prefix.'.index')">{{ $title }}</x-breadcrumb-item>
            <x-breadcrumb-item>{{ __($subtitle) }}</x-breadcrumb-item>
        </x-breadcrumb>
    </x-slot>
    <div class="w-full pt-4 px-4 sm:px-6 md:px-8 lg:pl-60">
        <x-splade-modal max-width="sm">
            <x-splade-form :action="route($prefix.'.store')" class="space-y-4">
                @include("$view.form")
            </x-splade-form>
        </x-splade-modal>
    </div>
</x-app-layout>
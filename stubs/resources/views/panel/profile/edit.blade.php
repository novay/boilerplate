@seoTitle(__('Profile'))
<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb>
            <x-breadcrumb-item>{{ __('Profile') }}</x-breadcrumb-item>
        </x-breadcrumb>
    </x-slot>

    <div class="w-full p-4 lg:pl-60 space-y-4">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl" dusk="update-profile-information">
                @include('panel.profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl" dusk="update-password">
                @include('panel.profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl" dusk="delete-user">
                @include('panel.profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>

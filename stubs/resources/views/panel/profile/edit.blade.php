@seoTitle(__('Profile'))
<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb>
            <x-breadcrumb-item href="javascript:;">{{ __('Profile') }}</x-breadcrumb-item>
            <x-breadcrumb-item>{{ me()->name }}</x-breadcrumb-item>
        </x-breadcrumb>
    </x-slot>

    <div class="flex">
        <div class="flex w-full bg-gray-200 rounded transition p-1 dark:bg-gray-600">
          <nav class="flex space-x-0.5" aria-label="Tabs" role="tablist">
            <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow hs-tab-active:text-gray-700 hs-tab-active:dark:bg-gray-800 hs-tab-active:dark:text-gray-400 dark:hs-tab-active:bg-gray-800 py-1.5 px-4 inline-flex items-center gap-x-2 bg-transparent text-sm font-semibold text-gray-500 hover:text-gray-700 font-medium rounded disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-white active" id="segment-item-1" data-hs-tab="#segment-1" aria-controls="segment-1" role="tab">
                Profile Information
            </button>
            <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow hs-tab-active:text-gray-700 hs-tab-active:dark:bg-gray-800 hs-tab-active:dark:text-gray-400 dark:hs-tab-active:bg-gray-800 py-1.5 px-4 inline-flex items-center gap-x-2 bg-transparent text-sm font-semibold text-gray-500 hover:text-gray-700 font-medium rounded disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-white" id="segment-item-2" data-hs-tab="#segment-2" aria-controls="segment-2" role="tab">
                Update Password
            </button>
            <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow hs-tab-active:text-gray-700 hs-tab-active:dark:bg-gray-800 hs-tab-active:dark:text-gray-400 dark:hs-tab-active:bg-gray-800 py-1.5 px-4 inline-flex items-center gap-x-2 bg-transparent text-sm font-semibold text-gray-500 hover:text-gray-700 font-medium rounded disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-white" id="segment-item-3" data-hs-tab="#segment-3" aria-controls="segment-3" role="tab">
                Delete Account
            </button>
          </nav>
        </div>
      </div>
      
      <div class="mt-3 lg:w-1/2">
        <div id="segment-1" role="tabpanel" aria-labelledby="segment-item-1">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                <div class="max-w-xl" dusk="update-profile-information">
                    @include('panel.profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>
        <div id="segment-2" class="hidden" role="tabpanel" aria-labelledby="segment-item-2">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                <div class="lg:max-w-xl" dusk="update-password">
                    @include('panel.profile.partials.update-password-form')
                </div>
            </div>
        </div>
        <div id="segment-3" class="hidden" role="tabpanel" aria-labelledby="segment-item-3">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                <div class="lg:max-w-xl" dusk="delete-user">
                    @include('panel.profile.partials.delete-user-form')
                </div>
            </div>
        </div>
      </div>
</x-app-layout>

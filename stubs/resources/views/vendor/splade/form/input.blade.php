@php $flatpickrOptions = $flatpickrOptions() @endphp

<SpladeInput
    {{ $attributes->only(['v-if', 'v-show', 'v-for', 'class'])->class(['hidden' => $isHidden()]) }}
    :flatpickr="@js($flatpickrOptions)"
    :js-flatpickr-options="{!! $jsFlatpickrOptions !!}"
    v-model="{{ $vueModel() }}"
    #default="inputScope"
>
    <label class="block">
        @includeWhen($label, 'splade::form.label', ['label' => $label])

        <div class="flex rounded border border-gray-300 dark:border-gray-950 shadow-sm">
            @if($prepend)
                <span :class="{ 'opacity-50': inputScope.disabled && @json(!$alwaysEnablePrepend) }" class="inline-flex items-center px-2 text-sm rounded-l border border-t-0 border-b-0 border-l-0 border-gray-300 bg-gray-50 text-gray-500">
                    {!! $prepend !!}
                </span>
            @endif

            <input {{ $attributes->except(['v-if', 'v-show', 'v-for', 'class'])->class([
                'block w-full py-1.5 px-2 border-0 text-sm focus:border-indigo-300 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed dark:text-white dark:bg-gray-900',
                'rounded' => !$append && !$prepend,
                'min-w-0 flex-1 rounded-none' => $append || $prepend,
                'rounded-l' => $append && !$prepend,
                'rounded-r' => !$append && $prepend,
            ])->merge([
                'name' => $name,
                'type' => $type,
                'data-validation-key' => $validationKey(),
            ])->when(!$flatpickrOptions, fn($attributes) => $attributes->merge([
                'v-model' => $vueModel(),
            ])) }}
            />

            @if($append)
                <span :class="{ 'opacity-50': inputScope.disabled && @json(!$alwaysEnableAppend) }" class="inline-flex items-center px-2 text-sm rounded-r border border-t-0 border-b-0 border-r-0 border-gray-300 bg-gray-50 text-gray-500">
                    {!! $append !!}
                </span>
            @endif
        </div>
    </label>

    @include('splade::form.help', ['help' => $help])
    @includeWhen($showErrors, 'splade::form.error', ['name' => $validationKey()])
</SpladeInput>
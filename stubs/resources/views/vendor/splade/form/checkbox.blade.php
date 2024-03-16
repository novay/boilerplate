<div {{ $attributes->only(['v-if', 'v-show', 'class']) }}>
    <label class="flex items-center">
        <input {{ $attributes->except(['v-if', 'v-show', 'class'])->class(
            'rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm disabled:opacity-50 dark:bg-gray-900'
        )->merge([
            'name' => $name,
            'value' => $value,
            'type' => 'checkbox',
            'v-model' => $vueModel(),
            'data-validation-key' => $validationKey(),
        ]) }} :true-value="@js($value)" :false-value="@js($falseValue)" />

        @if(trim($slot))
            <span class="ms-1.5 text-sm font-medium text-gray-700 dark:text-white">{{ $slot }}</span>
        @else
            <span class="ms-1.5 text-sm font-medium text-gray-700 dark:text-white">{{ $label }}</span>
        @endif
    </label>

    @includeWhen($help, 'splade::form.help', ['help' => $help])
    @includeWhen($showErrors, 'splade::form.error', ['name' => $validationKey()])
</div>



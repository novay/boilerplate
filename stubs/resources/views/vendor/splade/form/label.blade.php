<span class="block mb-1 text-sm font-medium text-gray-800 dark:text-gray-300 font-sans">
    {!! $label !!}
    @if($attributes->has('required') || $attributes->has('data-required'))
        <span aria-hidden="true" class="text-red-600" title="{{ __('This field is required') }}">*</span>
    @endif
</span>
@props(['name', 'label', 'type' => 'text', 'value' => '', 'placeholder' => '', 'autocomplete' => '', 'required' => false, 'inputId', 'readonly' => false])

<div>
    <label for="{{ $inputId }}" class="block text-sm/6 font-medium text-gray-900">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <div class="mt-2">
        <input id="{{ $inputId }}" type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}"
            @if($placeholder) placeholder="{{ $placeholder }}" @endif @if($autocomplete)
            autocomplete="{{ $autocomplete }}" @endif @if($required) required @endif
            class="{{ $errors->has($name) ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
            @if($readonly) readonly @endif />
        @error($name)
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
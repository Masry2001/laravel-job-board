<!-- 

-- props

- name (required)
- label (required)
- rows (default: 3)
- value (optional, auto-uses old($name))
- description (optional - like "Write a few sentences...")
- placeholder (optional) 
-->


@props(['name', 'label', 'rows' => 3, 'value' => '', 'description' => '', 'placeholder' => '', 'required' => false, 'inputId'])

<div>
    <label for="{{ $inputId }}" class="block text-sm/6 font-medium text-gray-900">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <div class="mt-2">
        <textarea id="{{ $inputId }}" name="{{ $name }}" rows="{{ $rows }}" @if($placeholder)
        placeholder="{{ $placeholder }}" @endif @if($required) required @endif
            class="{{ $errors->has($name) ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old($name, $value) }}</textarea>
        @error($name)
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    @if($description)
        <p class="mt-3 text-sm/6 text-gray-600">{{ $description }}</p>
    @endif
</div>
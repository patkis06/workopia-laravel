@props(['label', 'name', 'placeholder' => '', 'value' => '', 'cols' => 30, 'rows' => 7])

<div class="mb-4">
  <label class="block text-gray-700" for="description"
      >{{ $label }}</label
  >
  <textarea
      cols="{{ $cols }}"
      rows="{{ $rows }}"
      id="{{ $name }}"
      name="{{ $name }}"
      class="w-full px-4 py-2 border rounded focus:outline-none"
      placeholder="{{ $placeholder }}"
  >{{ old($name) }}</textarea>
  <x-input.error name="{{ $name }}" />
</div>
@props(['label', 'name', 'value' => '', 'accept' => '.pdf'])

<div class="mb-4">
  <label class="block text-gray-700" for="{{ $name }}"
      >{{ $label }}</label
  >
  <input
      id="{{ $name }}"
      type="file"
      name="{{ $name }}"
      value="{{ old($name) }}"
      class="w-full px-4 py-2 border rounded focus:outline-none"
      accept="{{ $accept }}"
  />
  <x-input.error name="{{ $name }}" />
</div>
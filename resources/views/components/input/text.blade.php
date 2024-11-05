@props(['label' => null, 'name', 'type' => 'text', 'placeholder' => '', 'value' => ''])

<div class="mb-4">
  @if ($label)
      <label class="block text-gray-700" for="{{ $name }}"
          >{{ $label }}</label
      >
  @endif
  <input
      id="{{ $name }}"
      type="{{ $type }}"
      name="{{ $name }}"
      value="{{ $value }}"
      class="w-full px-4 py-2 border rounded focus:outline-none"
      placeholder="{{ $placeholder }}"
  />
  <x-input.error name="{{ $name }}" />
</div>
@props(['name', 'label', 'options'])

<div class="mb-4">
  <label class="block text-gray-700" for="{{ $name }}"
      >{{ $label }}</label
  >
  <select
      id="{{ $name }}"
      name="{{ $name }}"
      class="w-full px-4 py-2 border rounded focus:outline-none"
  >
  @foreach($options as $key => $value)
      <option value="{{ $key }}" {{ (old($name) == $key ) ? 'selected' : '' }}>{{ $value }}</option>
  @endforeach
  </select>
  <x-input.error name="{{ $name }}" />
</div>
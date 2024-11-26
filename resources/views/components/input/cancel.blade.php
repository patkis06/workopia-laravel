@props(['value' => 'Cancel', 'click' => NULL])

<button @click="{{ $click }}" type="button" class="w-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
    {{ $value }}
</button>
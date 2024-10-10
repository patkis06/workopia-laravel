@props(['href' => '/', 'class' => null, 'active' => false, 'icon' => null])

<a href="{{ $href }}" @class([
    $class ?? 'block px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-black',
    $active ? 'bg-yellow-600 shadow-md font-bold' : ''
])>
    @if($icon)
        <i class="fa fa-{{ $icon }} mr-1"></i>
    @endif
    {{ $slot }}
</a>
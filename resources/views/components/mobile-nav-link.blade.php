@props(['href' => '/', 'class' => null, 'active' => false, 'icon' => null])

<a href="{{ $href }}" @class([
    $class ?? 'block px-4 py-2 hover:bg-blue-700',
    $active ? 'text-yellow-500 font-bold' : ''
])>
    @if($icon)
        <i class="fa fa-{{ $icon }} mr-1"></i>
    @endif
    {{ $slot }}
</a>

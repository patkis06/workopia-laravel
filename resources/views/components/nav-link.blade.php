@props(['href' => '/', 'class' => null, 'active' => false, 'icon' => null])

<a href="{{ $href }}" @class([
    $class ?? 'text-white hover:underline py-2',
    $active ? 'text-yellow-500 font-bold' : ''
])>
    @if($icon)
        <i class="fa fa-{{ $icon }} mr-1"></i>
    @endif
    {{ $slot }}
</a>

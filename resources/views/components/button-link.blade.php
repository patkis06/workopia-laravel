@props(['href' => '/', 'class' => null, 'active' => false, 'icon' => null])

<a href="{{ $href }}" @class([
    $class ?? 'bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300',
    $active ? 'bg-yellow-600 shadow-md font-bold' : ''
])>
    @if($icon)
        <i class="fa fa-{{ $icon }} mr-1"></i>
    @endif
    {{ $slot }}
</a>
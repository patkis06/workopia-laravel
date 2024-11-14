@props(['src', 'alt', 'width' => 24, 'height' => 24])

<img src="{{ $src }}" alt="{{ $alt }}" class="w-{{ $width }} h-{{ $height}} object-cover rounded-full">
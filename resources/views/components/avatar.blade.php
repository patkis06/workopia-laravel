@props(['avatar', 'alt' => '', 'width' => '100', 'height' => '100'])

<div class="flex items-center space-x-3">
  <a href="{{route('dashboard')}}">
    @empty($avatar)
      <img src="{{asset('storage/avatar/default-avatar.png')}}" alt=""
        class="w-{{ $width }} h-{{ $height }} rounded-full">
      @else
        <img src="{{asset('storage/' . $avatar)}}" alt="{{ $alt }}"
          class="w-{{ $width }} h-{{ $height }} rounded-full">
      @endempty
  </a>
</div>
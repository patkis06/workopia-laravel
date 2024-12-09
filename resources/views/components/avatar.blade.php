@props(['avatar', 'alt' => '', 'width' => '350', 'height' => '350'])

<div class="flex items-center space-x-3">
  <a href="{{route('dashboard')}}">
    @empty($avatar)
      <img src="{{asset('storage/avatar/default-avatar.png')}}" width="{{ $width }}" height="{{ $height }}" alt=""
        class="rounded-full">
      @else
        <img src="{{asset('storage/' . $avatar)}}" width="{{ $width }}" height="{{ $height }}" alt="{{ $alt }}"
          class="rounded-full">
      @endempty
  </a>
</div>
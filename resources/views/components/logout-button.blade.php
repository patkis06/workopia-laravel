@props(['class' => null])

<form method="POST" action="{{route('logout')}}">
  @csrf
  @method('DELETE')
  <button type="submit" class="text-white {{ $class }}">
      <i class="fa fa-sign-out"></i> Logout
  </button>
</form>
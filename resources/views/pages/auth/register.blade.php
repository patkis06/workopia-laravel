<x-layout :exclude="['hero', 'bottom-banner', 'top-banner']">
  <div
  class="bg-white rounded-lg shadow-md w-full md:max-w-xl mx-auto mt-12 p-8 py-12"
>
  <h2 class="text-4xl text-center font-bold mb-4">Register</h2>
  <form action="{{route('register.store')}}" method="POST">
    @csrf
    <x-input.text name="name" placeholder="Full Name" value="{{ old('name') }}" />
    <x-input.text name="email" placeholder="Email Address" value="{{ old('email') }}" />
    <x-input.text type="password" name="password" placeholder="Password" />
    <x-input.text type="password" name="password_confirmation" placeholder="Confirm Password" />    
    <x-input.submit value="Register" />

    <p class="mt-4 text-gray-500">
        Already have an account?
        <a class="text-blue-900" href="{{ route('login') }}">Login</a>
    </p>
  </form>
</div>
</x-layout> 
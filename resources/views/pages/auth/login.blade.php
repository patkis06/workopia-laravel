<x-layout :exclude="['hero', 'bottom-banner', 'top-banner']">
  <div
  class="bg-white rounded-lg shadow-md w-full md:max-w-xl mx-auto mt-12 p-8 py-12"
>
  <h2 class="text-4xl text-center font-bold mb-4">Login</h2>
  <x-message />
  <form action="{{route('authozize')}}" method="POST">
      @csrf
      <x-input.text name="email" placeholder="Email Address" value="{{ old('email') }}" />
      <x-input.text type="password" name="password" placeholder="Password" value="{{ old('password') }}" />
      <x-input.submit value="Login" />

      <p class="mt-4 text-gray-500">
          Don't have an account?
          <a class="text-blue-900" href="{{ route('register') }}"
              >Register</a
          >
      </p>
  </form>
</div>
</x-layout>
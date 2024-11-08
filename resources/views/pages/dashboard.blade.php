<x-layout>
    <section class="flex flex-col md:flex-row gap-6">
        <!-- Profile Info -->
        <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-1/2">
            <h3 class="text-3xl text-center font-bold mb-4">
                Profile Info
            </h3>
            <form
                method="POST"
                action="{{ route('users.update', $user->id) }}"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')
                <div class="mt-2 flex justify-center">
                @if ($user->avatar)
                    <img src="{{asset('storage/' . $user->avatar)}}" alt="{{$user->name}}" class="w-24 h-24 object-cover rounded-full">
                @else
                    <img src="{{asset('storage/avatar/avatar_default.png')}}" alt="{{$user->name}}" class="w-24 h-24 object-cover rounded-full">
                @endif
                </div>
                <x-input.text label="Name" name="name" value="{{ $user->name }}" />
                <x-input.text label="Email" name="email" value="{{ $user->email }}" />
                <x-input.image label="Avatar" name="avatar" value="{{ $user->avatar }}" />
                <x-input.submit />
            </form>
        </div>

        <!-- My Jobs -->
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <h3 class="text-3xl text-center font-bold mb-4">
                My Jobs
            </h3>
            @foreach ($jobs as $job)
                <x-job.dashboard :job="$job" />   
            @endforeach
        </div>
    </section>
</x-layout> 
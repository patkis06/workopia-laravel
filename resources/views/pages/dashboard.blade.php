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
                <x-input.text label="Name" name="Name" value="{{$user->name}}" />
                <x-input.text label="Email" name="email" value="{{$user->email}}" />
                <x-input.image label="Avatar" name="avartar" value="{{ old('company_logo') }}" />
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
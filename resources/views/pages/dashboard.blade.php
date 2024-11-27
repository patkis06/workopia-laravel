<x-layout>
    <x-message />
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
                    <x-avatar avatar="{{ $user->avatar }}" alt="{{$user->name}}"/>
                </div>
                <x-input.text label="Name" name="name" value="{{ $user->name }}" />
                <x-input.text label="Email" name="email" value="{{ $user->email }}" />
                <x-input.file accept="image/*" label="Avatar" name="avatar" value="{{ $user->avatar }}" />
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
            
                {{-- Applicants --}}
            <div class="mt-4 bg-gray-100 p-2">
                <h4 class="text-lg font-semibold mb-2">Applicants</h4>
                @forelse($job->applicants as $applicant)
                    <div class="py-2">
                        <p class="text-gray-800">
                            <strong>Name: </strong> {{$applicant->full_name}}
                        </p>
                        <p class="text-gray-800">
                            <strong>Phone: </strong> {{$applicant->contact_phone}}
                        </p>
                        <p class="text-gray-800">
                            <strong>Email: </strong> {{$applicant->contact_email}}
                        </p>
                        <p class="text-gray-800">
                            <strong>Message: </strong> {{$applicant->message}}
                        </p>
                        <p class="text-gray-800 mt-2">
                            <a href="{{asset('storage/' . $applicant->resume_path)}}" class="text-blue-500 hover:underline text-sm"
                            download>
                            <i class="fas fa-download"></i> Download Resume
                            </a>
                        </p>
                        {{-- Delete Applicant --}}
                        <div x-cloak x-data="{ openDeleteConfirmation: false }">
                            <form id="deleteApplicantForm" x-ref="deleteApplicantForm" method="POST" action="{{route('applicant.destroy', $applicant->id)}}" @submit.prevent="openDeleteConfirmation = true">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-sm">
                                <i class="fas fa-trash"></i> Delete Applicant
                                </button>
                            </form>

                            <x-delete-confirmation form="deleteApplicantForm" message="Are you sure you want to delete this application?" />
                        </div>
                    
                    </div>      
                @empty
                    <p class="text-gray-700 mb-5">No applicants for this job</p>
                @endforelse
            </div>  


            @endforeach

            

        </div>
    </section>
</x-layout> 
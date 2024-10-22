<x-layout>
    <h2 class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">
        Recent Jobs
    </h2>
    @if (session('message'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 text-center mb-6" role="alert">
        {{ session('message') }}
    </div>    
    @endif

    @if (!empty($jobs))
        <x-job-cards :jobs="$jobs" />
    @else
        <p class="text-center text-xl my-6">No jobs found</p>
    @endif

    <a href="jobs" class="block text-xl text-center">
    <i class="fa fa-arrow-alt-circle-right"></i> Show All Jobs
    </a>
</x-layout> 
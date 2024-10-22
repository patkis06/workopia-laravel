<x-layout>
    <x-page-title>Recent Jobs</x-page-title>
    @if (session('message'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 text-center mb-6" role="alert">
        {{ session('message') }}
    </div>    
    @endif

    @if (!empty($jobs))
        <x-job-cards :jobs="$jobs" />
    @else
        <x-job-empty />
    @endif

    <a href="jobs" class="block text-xl text-center">
        <i class="fa fa-arrow-alt-circle-right"></i> Show All Jobs
    </a>
</x-layout> 
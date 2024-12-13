<x-layout>
    <x-page-title>Latest Opportunities
    </x-page-title>
    <x-message />
    @if (session('message'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 text-center mb-6" role="alert">
        {{ session('message') }}
    </div>    
    @endif

    @if (!empty($jobs))
        <x-job.container :jobs="$jobs" />
    @else
        <x-job.empty />
    @endif

    <a href="{{ route('jobs.index') }}" class="block text-xl text-center">
        <i class="fa fa-arrow-alt-circle-right"></i> Show All Jobs
    </a>
</x-layout> 
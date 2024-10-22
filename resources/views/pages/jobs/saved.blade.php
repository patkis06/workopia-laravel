<x-layout>
    <x-page-title>Saved Jobs</x-page-title>
    @if (!empty($jobs))
        <x-job.container :jobs="$jobs" />
        <x-pagination :items="$jobs" />
    @else
        <x-job.empty />
    @endif
</x-layout> 
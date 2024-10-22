<x-layout>
    <x-page-title>All Jobs</x-page-title>
    @if (!empty($jobs))
        <x-job-cards :jobs="$jobs" />
        <x-pagination :items="$jobs" />
    @else
        <x-job-empty />
    @endif
</x-layout> 
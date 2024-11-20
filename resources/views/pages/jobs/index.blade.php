<x-layout>
    <x-page-title>All Jobs</x-page-title>

    <x-message />

    @if (!empty($jobs))
        <x-job.container :jobs="$jobs" />
        <x-pagination :items="$jobs" />
    @else
        <x-job.empty />
    @endif
</x-layout> 
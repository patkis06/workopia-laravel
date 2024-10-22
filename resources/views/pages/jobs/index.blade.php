<x-layout>
    <h2 class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">
        All Jobs
    </h2>
    @if (!empty($jobs))
        <x-job-cards :jobs="$jobs" />
        <x-pagination :items="$jobs" />
    @else
        <x-job-empty />
    @endif
</x-layout> 
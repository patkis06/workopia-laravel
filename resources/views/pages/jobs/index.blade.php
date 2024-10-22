<x-layout>
    <h2 class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">
        All Jobs
    </h2>
    @if (!empty($jobs))
        <x-job-cards :jobs="$jobs" />
        <!-- Pagination -->
        <div class="flex justify-center mt-6">
            {{ $jobs->links() }}
        </div>
    @else
        <x-job-empty />
    @endif
</x-layout> 
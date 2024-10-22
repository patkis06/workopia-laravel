<x-layout>
    <h2 class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">
        Saved Jobs
    </h2>
    @if (!empty($jobs))
        <x-job-cards :jobs="$jobs" />
    @else
        <p class="text-center text-xl my-6">No jobs found</p>
    @endif
    <!-- Pagination -->
    <div class="flex justify-center mt-6">
        {{ $jobs->links() }}
    </div>
</x-layout> 
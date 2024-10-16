<x-layout>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    @foreach ($jobs as $job)
    <div class="rounded-lg shadow-md bg-white p-4">
        <div class="flex items-center space-between gap-4">
            <img
                src="/images/logos/logo-algorix.png"
                alt=""
                class="w-14"
            />
            <div>
                <h2 class="text-xl font-semibold">
                    {{ $job->title }}
                </h2>
                <p class="text-sm text-gray-500">{{ $job->job_type }}</p>
            </div>
        </div>
        <p class="text-gray-700 text-lg mt-2">
            {{ limit_description($job->description) }}
        </p>
        <ul class="my-4 bg-gray-100 p-4 rounded">
            <li class="mb-2"><strong>Salary:</strong> {{ format_salary($job->salary) }}</li>
            <li class="mb-2">
                <strong>Location:</strong> {{ $job->city }}, {{ $job->state }}
                <span
                    class="text-xs bg-red-500 text-white rounded-full px-2 py-1 ml-2"
                    >{{ $job->job_type }}</span
                >
            </li>
            <li class="mb-2">
                {{ format_tags($job->tags) }}
            </li>
        </ul>
        <a
            href="jobs/show"
            class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200"
        >
            Details
        </a>
    </div>
    @endforeach
</div>
<!-- Pagination -->
<div class="flex justify-center mt-6">
    {{ $jobs->links() }}
</div>
</x-layout> 
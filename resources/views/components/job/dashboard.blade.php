@props(['job' => []])

<div
  class="flex justify-between items-center border-b-2 border-gray-200 py-2"
>
  <div>
      <h3 class="text-xl font-semibold">
          {{ $job->title }}
      </h3>
      <p class="text-gray-700">{{ $job->job_type }}</p>
  </div>
  <div class="flex gap-3">
      <a
          href="{{ route('jobs.edit', $job->id) }}"
          class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm"
          >Edit</a
      >
      <form method="POST" action="{{ route('jobs.destroy', $job->id) }}?redirect=dashboard">
          @csrf
          @method('DELETE')
          <button
              type="submit"
              class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm"
          >
              Delete
          </button>
      </form>
  </div>
</div>
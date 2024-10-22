@props(['jobs'])

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
  @foreach ($jobs as $job)
      <x-job.card :job="$job" />
  @endforeach
</div>
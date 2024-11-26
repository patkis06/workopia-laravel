@props(['title' => ''])

<!-- Applicant Modal -->
<div x-show="openApplicantForm" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50">
  <div @click.away="openApplicantForm = false" class="bg-white p-6 rounded-lg shadow-lg w-96">
    <h2 class="text-xl font-semibold mb-4">Apply to {{ $title }}</h2>

    <div class="flex justify-end space-x-4">
      {{ $slot }}
    </div>
  </div>
</div>
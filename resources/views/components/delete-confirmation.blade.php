@props(['form' => 'deleteForm', 'message' => 'Are you sure you want to delete this job?'])

<!-- Confirmation Modal -->
<div x-show="openDeleteConfirmation" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50">
  <div @click.away="openDeleteConfirmation = false" class="bg-white p-6 rounded-lg shadow-lg w-96">
      <h2 class="text-xl font-semibold mb-4">Confirm Delete</h2>
      <p class="text-gray-600 mb-6">{{ $message }}</p>
      
      <div class="flex justify-end space-x-4">
          <!-- Cancel button -->
          <button @click="openDeleteConfirmation = false" type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
              Cancel
          </button>

          <!-- Confirm delete button -->
          <button @click="$refs.{{ $form }}.submit()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
              Delete
          </button>
      </div>
  </div>
</div>
@if (session('success'))
<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 text-center mb-6" role="alert">
  {{ session('success') }}
</div>
@elseif (session('error'))
<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 text-center mb-6" role="alert">
  {{ session('error') }}
</div>
@endif
<x-layout :exclude="['hero', 'bottom-banner', 'top-banner']">
  <div
  class="bg-white rounded-lg shadow-md w-full md:max-w-xl mx-auto mt-12 p-8 py-12"
>
  <h2 class="text-4xl text-center font-bold mb-4">Apply to {{ $job->title }}</h2>
  <x-message />
  <form method="POST" action="{{ route('applicant.store', $job->id)}}" enctype="multipart/form-data">
      @csrf
      
      <x-input.text label="Full Name" name="full_name" value="{{ old('full_name') }}" />

      <x-input.text label="Contact Phone" name="contact_phone" value="{{ old('contact_phone') }}" />

      <x-input.text label="Contact Email" name="contact_email" value="{{ old('contact_email') }}" />

      <x-input.textarea label="Message" name="message" value="{{ old('message') }}" />

      <x-input.text label="Location" name="location" value="{{ old('location') }}" />

      <x-input.file label="Resume" name="resume" value="{{ old('resume') }}" />
      
      <x-input.submit />
  </form>
  </div>  
</x-layout>
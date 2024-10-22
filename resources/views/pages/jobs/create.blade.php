<x-layout>
  <div
  class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl"
>
  <x-page-title>Create Job</x-page-title>
  
  <form
      method="POST"
      action="/jobs"
      enctype="multipart/form-data"
  >
      @csrf
      <h2
          class="text-2xl font-bold mb-6 text-center text-gray-500"
      >
          Job Info
      </h2>

      <x-input.text label="Title" name="title" placeholder="Software Developer" value="{{ old('title') }}" />

      <div class="mb-4">
          <label class="block text-gray-700" for="description"
              >Job Description</label
          >
          <textarea
              cols="30"
              rows="7"
              id="description"
              name="description"
              class="w-full px-4 py-2 border rounded focus:outline-none"
              placeholder="We are seeking a skilled and motivated Software Developer to join our growing development team..."
          >{{ old('description') }}</textarea>
          @error('description')
              <p class="text-red-500">{{ $message }}</p>
          @enderror
      </div>

      <div class="mb-4">
          <label class="block text-gray-700" for="salary"
              >Annual Salary</label
          >
          <input
              id="salary"
              type="number"
              name="salary"
              value="{{ old('salary') }}"
              class="w-full px-4 py-2 border rounded focus:outline-none"
              placeholder="90000"
          />
          @error('salary')
              <p class="text-red-500">{{ $message }}</p>
          @enderror
      </div>

      <div class="mb-4">
          <label class="block text-gray-700" for="requirements"
              >Requirements</label
          >
          <textarea
              id="requirements"
              name="requirements"
              class="w-full px-4 py-2 border rounded focus:outline-none"
              placeholder="Bachelor's degree in Computer Science"
          >{{ old('requirements') }}</textarea>
          @error('requirements')
              <p class="text-red-500">{{ $message }}</p>
          @enderror
      </div>

      <div class="mb-4">
          <label class="block text-gray-700" for="benefits"
              >Benefits</label
          >
          <textarea
              id="benefits"
              name="benefits"
              class="w-full px-4 py-2 border rounded focus:outline-none"
              placeholder="Health insurance, 401k, paid time off"
          >{{ old('benefits') }}</textarea>
          @error('benefits')
              <p class="text-red-500">{{ $message }}</p>
          @enderror
      </div>

      <div class="mb-4">
          <label class="block text-gray-700" for="tags"
              >Tags (comma-separated)</label
          >
          <input
              id="tags"
              type="text"
              name="tags"
              value="{{ old('tags') }}"
              class="w-full px-4 py-2 border rounded focus:outline-none"
              placeholder="development,coding,java,python"
          />
          @error('tags')
              <p class="text-red-500">{{ $message }}</p>
          @enderror
      </div>

      <div class="mb-4">
          <label class="block text-gray-700" for="job_type"
              >Job Type</label
          >
          <select
              id="job_type"
              name="job_type"
              class="w-full px-4 py-2 border rounded focus:outline-none"
          >
              <option value="Full-Time" {{ (old('job_type') == 'Full-Time' ) ? 'selected' : '' }}>Full-Time</option>
              <option value="Part-Time" {{ (old('job_type') == 'Part-Time' ) ? 'selected' : '' }}>Part-Time</option>
              <option value="Contract" {{ (old('job_type') == 'Contract' ) ? 'selected' : '' }}>Contract</option>
              <option value="Temporary" {{ (old('job_type') == 'Temporary' ) ? 'selected' : '' }}>Temporary</option>
              <option value="Internship" {{ (old('job_type') == 'Internship' ) ? 'selected' : '' }}>Internship</option>
              <option value="Volunteer" {{ (old('job_type') == 'Volunteer' ) ? 'selected' : '' }}>Volunteer</option>
              <option value="On-Call" {{ (old('job_type') == 'On-Call' ) ? 'selected' : '' }}>On-Call</option>
          </select>
          @error('job_type')
              <p class="text-red-500">{{ $message }}</p>
          @enderror
      </div>

      <div class="mb-4">
          <label class="block text-gray-700" for="remote"
              >Remote</label
          >
          <select
              id="remote"
              name="remote"
              class="w-full px-4 py-2 border rounded focus:outline-none"
          >
              <option value="0" {{ (old('remote') == '0' ) ? 'selected' : '' }}>No</option>
              <option value="1"  {{ (old('remote') == '1' ) ? 'selected' : '' }}>Yes</option>
          </select>
          @error('remote')
              <p class="text-red-500">{{ $message }}</p>
          @enderror
      </div>

      <div class="mb-4">
          <label class="block text-gray-700" for="address"
              >Address</label
          >
          <input
              id="address"
              type="text"
              name="address"
              value="{{ old('address') }}"
              class="w-full px-4 py-2 border rounded focus:outline-none"
              placeholder="123 Main St"
          />
          @error('address')
              <p class="text-red-500">{{ $message }}</p>
          @enderror
      </div>

      <div class="mb-4">
          <label class="block text-gray-700" for="city"
              >City</label
          >
          <input
              id="city"
              type="text"
              name="city"
              value="{{ old('city') }}"
              class="w-full px-4 py-2 border rounded focus:outline-none"
              placeholder="Albany"
          />
          @error('city')
              <p class="text-red-500">{{ $message }}</p>
          @enderror
      </div>

      <div class="mb-4">
          <label class="block text-gray-700" for="state"
              >State</label
          >
          <input
              id="state"
              type="text"
              name="state"
              value="{{ old('state') }}"
              class="w-full px-4 py-2 border rounded focus:outline-none"
              placeholder="NY"
          />
          @error('state')
              <p class="text-red-500">{{ $message }}</p>
          @enderror
      </div>

      <div class="mb-4">
          <label class="block text-gray-700" for="zipcode"
              >ZIP Code</label
          >
          <input
              id="zipcode"
              type="text"
              name="zipcode"
              value="{{ old('zipcode') }}"
              class="w-full px-4 py-2 border rounded focus:outline-none"
              placeholder="12201"
          />
          @error('zipcode')
              <p class="text-red-500">{{ $message }}</p>
          @enderror
      </div>

      <h2
          class="text-2xl font-bold mb-6 text-center text-gray-500"
      >
          Company Info
      </h2>

      <div class="mb-4">
          <label class="block text-gray-700" for="company_name"
              >Company Name</label
          >
          <input
              id="company_name"
              type="text"
              name="company_name"
              value="{{ old('company_name') }}"
              class="w-full px-4 py-2 border rounded focus:outline-none"
              placeholder="Company name"
          />
          @error('company_name')
              <p class="text-red-500">{{ $message }}</p>
          @enderror
      </div>

      <div class="mb-4">
          <label
              class="block text-gray-700"
              for="company_description"
              >Company Description</label
          >
          <textarea
              id="company_description"
              name="company_description"
              class="w-full px-4 py-2 border rounded focus:outline-none"
              placeholder="Company Description"
          >{{ old('company_description') }}</textarea>
          @error('company_description')
              <p class="text-red-500">{{ $message }}</p>
          @enderror
      </div>

      <div class="mb-4">
          <label class="block text-gray-700" for="company_website"
              >Company Website</label
          >
          <input
              id="company_website"
              type="text"
              name="company_website"
              value="{{ old('company_website') }}"
              class="w-full px-4 py-2 border rounded focus:outline-none"
              placeholder="Enter website"
          />
          @error('company_website')
              <p class="text-red-500">{{ $message }}</p>
          @enderror
      </div>

      <div class="mb-4">
          <label class="block text-gray-700" for="contact_phone"
              >Contact Phone</label
          >
          <input
              id="contact_phone"
              type="text"
              name="contact_phone"
              value="{{ old('contact_phone') }}"
              class="w-full px-4 py-2 border rounded focus:outline-none"
              placeholder="Enter phone"
          />
          @error('contact_phone')
              <p class="text-red-500">{{ $message }}</p>
          @enderror
      </div>

      <div class="mb-4">
          <label class="block text-gray-700" for="contact_email"
              >Contact Email</label
          >
          <input
              id="contact_email"
              type="email"
              name="contact_email"
              value="{{ old('contact_email') }}"
              class="w-full px-4 py-2 border rounded focus:outline-none"
              placeholder="Email where you want to receive applications"
          />
          @error('contact_email')
              <p class="text-red-500">{{ $message }}</p>
          @enderror
      </div>

      <div class="mb-4">
          <label class="block text-gray-700" for="company_logo"
              >Company Logo</label
          >
          <input
              id="company_logo"
              type="file"
              name="company_logo"
              value="{{ old('company_logo') }}"
              class="w-full px-4 py-2 border rounded focus:outline-none"
          />
          @error('company_logo')
              <p class="text-red-500">{{ $message }}</p>
          @enderror
      </div>

      <button
          type="submit"
          class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none"
      >
          Save
      </button>
  </form>
</div>
</x-layout> 
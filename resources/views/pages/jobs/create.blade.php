<x-layout :exclude="['hero', 'bottom-banner', 'top-banner']">
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
        <x-page-title>Create Job</x-page-title>

        <x-message />

        <form method="POST" action="/jobs" enctype="multipart/form-data">
            @csrf
            <x-job.heading>Job Info</x-job.heading>

            <x-input.text label="Job Title" name="title" placeholder="Software Developer" value="{{ old('title') }}" />

            <x-input.textarea label="Job Description" name="description" placeholder="We are seeking a skilled and motivated Software Developer to join our growing development team..." value="{{ old('description') }}" />

            <x-input.text label="Annual Salary" name="salary" type="number" placeholder="90000" value="{{ old('salary') }}" />

            <x-input.textarea label="Requirements" name="requirements" placeholder="Bachelor's degree in Computer Science" value="{{ old('requirements') }}" />

            <x-input.textarea label="Benefits" name="benefits" placeholder="Health insurance, 401k, paid time off" value="{{ old('benefits') }}" />

            <x-input.text label="Tags (comma-separated)" name="tags" placeholder="development, coding, java, python" value="{{ old('tags') }}" />

            <x-input.select label="Job Type" name="job_type" :options="['Full-Time' => 'Full-Time', 'Part-Time' => 'Part-Time', 'Contract' => 'Contract', 'Temporary' => 'Temporary', 'Internship' => 'Internship', 'Volunteer' => 'Volunteer', 'On-Call' => 'On-Call']" />

            <x-input.select label="Remote" name="remote" :options="[0 => 'No', 1 => 'Yes']" />

            <x-input.text label="Address" name="address" placeholder="123 Main St" value="{{ old('address') }}" />

            <x-input.text label="City" name="city" placeholder="Albany" value="{{ old('city') }}" />

            <x-input.text label="State" name="text" placeholder="Albany" value="{{ old('state') }}" />

            <x-input.text label="ZIP Code" name="zipcode" placeholder="12201" value="{{ old('zipcode') }}" />

            <x-job.heading>Company Info</x-job.heading>

            <x-input.text label="Company Name" name="company_name" placeholder="Company name" value="{{ old('company_name') }}" />

            <x-input.text label="Company Description" name="company_description" placeholder="Company Description" value="{{ old('company_description') }}" />

            <x-input.text label="Company Website" name="company_website" placeholder="Enter website" value="{{ old('company_website') }}" />

            <x-input.text label="Contact Phone" name="contact_phone" placeholder="Enter phone" value="{{ old('contact_phone') }}" />

            <x-input.text label="Contact Email" name="contact_email" placeholder="Email where you want to receive applications" value="{{ old('contact_email') }}" />

            <x-input.file label="Company Logo" name="company_logo" accept="image/*" value="{{ old('company_logo') }}" />

            <x-input.submit />
        </form>
    </div>
</x-layout> 
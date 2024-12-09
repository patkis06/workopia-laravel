<x-layout :exclude="['hero', 'bottom-banner', 'top-banner']">
  
  <x-message />

  <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    <!-- Job Details Column -->
    <section class="md:col-span-3">
        <div class="rounded-lg shadow-md bg-white p-3">
            <div class="flex justify-between items-center">
                <a
                    class="block p-4 text-blue-700"
                    href="{{ route('jobs.index') }}"
                >
                    <i class="fa fa-arrow-alt-circle-left"></i>
                    Back To Jobs
                </a>
                <div class="flex space-x-3 ml-4">
                    <!-- Edit Form -->
                    @can('update', $job)
                        <a
                            href="{{ route('jobs.edit', $job->id) }}"
                            class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded"
                            >Edit</a
                        >
                    @endcan
                    <!-- EndEdit Form -->

                    <!-- Delete Form -->
                    @can('delete', $job)
                        <div x-cloak x-data="{ openDeleteConfirmation: false }">
                            <form x-ref="deleteForm" method="POST" action="/jobs/{{ $job->id }}/delete" @submit.prevent="openDeleteConfirmation = true">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded"
                                >
                                    Delete
                                </button>
                            </form>

                            <x-delete-confirmation/>
                        </div>
                    @endcan
                    <!-- End Delete Form -->
                </div>
            </div>
            <div class="p-4">
                <h2 class="text-xl font-semibold">
                    {{ $job->title }}
                </h2>
                <p class="text-gray-700 text-lg mt-2">
                    {{ $job->description }}
                </p>
                <ul class="my-4 bg-gray-100 p-4">
                    <li class="mb-2">
                        <strong>Job Type:</strong> {{ $job->job_type }}
                    </li>
                    <li class="mb-2">
                        <strong>Remote:</strong> {{ format_remote($job->remote) }}
                    </li>
                    <li class="mb-2">
                        <strong>Salary:</strong> {{ format_salary($job->salary) }}
                    </li>
                    <li class="mb-2">
                        <strong>Site Location:</strong> {{ $job->city }}, {{ $job->state }}
                    </li>
                    <li class="mb-2">
                        <strong>Tags:</strong>
                        {{ format_tags($job->tags) }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="container mx-auto p-4">
            <h2 class="text-xl font-semibold mb-4">Job Details</h2>
            <div class="rounded-lg shadow-md bg-white p-4">
                <h3
                    class="text-lg font-semibold mb-2 text-blue-500"
                >
                    Job Requirements
                </h3>
                <p>
                    {{ $job->requirements }}
                </p>
                <h3
                    class="text-lg font-semibold mt-4 mb-2 text-blue-500"
                >
                    Benefits
                </h3>
                <p>
                    {{ $job->benefits }}
                </p>
            </div>

            @auth
                <p class="my-5">
                    Put "Job Application" as the subject of your email
                    and attach your resume.
                </p>

                <div>
                    <a href="{{ route('applicant.index', $job) }}" class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                        Apply Now
                    </a>
                </div>
            @endauth
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-md mt-6">
            <div id="map"></div>
        </div>
    </section>

    <!-- Sidebar -->
    <aside class="bg-white rounded-lg shadow-md p-3">
        <h3 class="text-xl text-center mb-4 font-bold">
            Company Info
        </h3>
        <img
            src="/images/{{ $job->company_logo }}"
            alt="{{ $job->company_name }}"
            class="w-full rounded-lg mb-4 m-auto"
        />
        <h4 class="text-lg font-bold">{{ $job->company_name  }} </h4>
        <p class="text-gray-700 text-lg my-3">
            {{ limit_description($job->company_description) }}
        </p>
        <a
            href="{{ $job->company_website }}"
            target="_blank"
            class="text-blue-500"
            >Visit Website</a
        >

        @auth
            @php
                $bookmarked = false;
                if (in_array($job->id, $bookmarkedJobs)) {
                    $bookmarked = true;
                }   
            @endphp

            <form 
                action="{{ route('jobs.bookmark', $job->id) }}" 
                method="POST"
                style="display: inline;"
            >
                @csrf
                @if (!$bookmarked)
                    <button type="submit" class="mt-10 bg-blue-500 hover:bg-blue-600 text-white font-bold w-full py-2 px-4 rounded-full flex items-center justify-center">
                        <i class="fas fa-bookmark mr-3"></i> Bookmark Job
                    </button>
                @else
                    @method('DELETE')
                    <button type="submit" class="mt-10 bg-red-500 hover:bg-red-600 text-white font-bold w-full py-2 px-4 rounded-full flex items-center justify-center">
                        <i class="fas fa-bookmark mr-3"></i> Unbookmark Job
                    </button>
                @endif
                            
            </form>
        @endauth
    </aside>
</div>
</x-layout>

<link href="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css" rel="stylesheet" />
<script src="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Mapbox access token
    mapboxgl.accessToken = "{{ env('MAPBOX_API_KEY') }}";

    // Initialize the map
    const map = new mapboxgl.Map({
      container: 'map', // ID of the container element
      style: 'mapbox://styles/mapbox/streets-v11', // Map style
      center: [-74.5, 40], // Default center
      zoom: 9, // Default zoom level
    });

    // Get address from Laravel view
    const city = '{{ $job->city }}';
    const state = '{{ $job->state }}';
    const address = city + ', ' + state;

    // Geocode the address
    fetch(`/geocode?address=${encodeURIComponent(address)}`)
      .then((response) => response.json())
      .then((data) => {
        if (data.features.length > 0) {
          const [longitude, latitude] = data.features[0].center;

          // Center the map and add a marker
          map.setCenter([longitude, latitude]);
          map.setZoom(14);

          new mapboxgl.Marker().setLngLat([longitude, latitude]).addTo(map);
        } else {
          console.error('No results found for the address.');
        }
      })
      .catch((error) => console.error('Error geocoding address:', error));
  });
</script>
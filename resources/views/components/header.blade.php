<header class="bg-blue-900 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="{{url('')}}">Workopia</a>
        </h1>
        <nav class="hidden md:flex items-center space-x-4">
            <x-nav-link href="{{url('jobs')}}" :active="request()->is('jobs')">All Jobs</x-nav-link>
            <x-nav-link href="{{url('jobs/saved')}}" :active="request()->is('jobs/saved')">Saved Jobs</x-nav-link>
            <x-nav-link href="{{url('login')}}" :active="request()->is('login')">Login</x-nav-link>
            <x-nav-link href="{{url('register')}}" :active="request()->is('register')">Register</x-nav-link>
            <x-nav-link href="{{url('dashboard')}}" :active="request()->is('dashboard')" icon="gauge" >Dashboard</x-nav-link>
            <x-button-link href="{{url('jobs/create')}}" :active="request()->is('jobs/create')" icon="edit">Create Job</x-button-link>
        </nav>
        <x-mobile-hamburger-button/>
    </div>
    <!-- Mobile Menu -->
    <div x-data id="mobile-menu" :class="$store.menu.open ? 'block md:hidden bg-blue-900 text-white mt-5 pb-4 space-y-2' : 'hidden'">
        <x-mobile-nav-link href="{{url('jobs')}}" :active="request()->is('jobs')">All Jobs</x-mobile-nav-link>
        <x-mobile-nav-link href="{{url('jobs/saved')}}" :active="request()->is('jobs/saved')">Saved Jobs</x-mobile-nav-link>
        <x-mobile-nav-link href="{{url('login')}}" :active="request()->is('login')">Login</x-mobile-nav-link>
        <x-mobile-nav-link href="{{url('register')}}" :active="request()->is('register')">Register</x-mobile-nav-link>
        <x-mobile-nav-link href="{{url('dashboard')}}" :active="request()->is('dashboard')" icon="gauge" >Dashboard</x-mobile-nav-link>
        <x-button-link href="{{url('jobs/create')}}" :active="request()->is('jobs/create')" icon="edit" class="block px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-black">Create Job</x-button-link>
    </div>
</header>
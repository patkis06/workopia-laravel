<section class="hero relative bg-cover bg-center bg-no-repeat h-80 flex items-center" style="background-image: url('{{ asset('images/hero.jpg')}}');">
            <div class="overlay"></div>
            <div class="container mx-auto text-center z-10">
                <h2 class="text-4xl md:text-5xl text-white font-bold mb-8">
                    Discover Your Ideal Career
                </h2>
                <form method="POST" action="/jobs/search" class="block mx-5 space-y-2 md:mx-auto md:space-x-2">
                    @csrf
                    <input
                        type="text"
                        name="keywords"
                        value="{{ request('keywords') ?? old('keywords') }}"
                        placeholder="Keywords"
                        class="w-full md:w-72 px-4 py-3 focus:outline-none"
                    />
                    @error('keywords')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <input
                        type="text"
                        name="location"
                        value="{{ request('location') ?? old('location') }}"
                        placeholder="Location"
                        class="w-full md:w-72 px-4 py-3 focus:outline-none"
                    />
                    @error('location')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <button
                        class="w-full md:w-auto bg-blue-700 hover:bg-blue-600 text-white px-4 py-3 focus:outline-none"
                    >
                        <i class="fa fa-search mr-1"></i> Search
                    </button>
                </form>
            </div>
        </section>
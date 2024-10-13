<x-layout>
    <section class="flex flex-col md:flex-row gap-6">
        <!-- Profile Info -->
        <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-1/2">
            <h3 class="text-3xl text-center font-bold mb-4">
                Profile Info
            </h3>
            <form
                method="POST"
                action="/Jobs"
                enctype="multipart/form-data"
            >
                <div class="mb-4">
                    <label class="block text-gray-700" for="name"
                        >Name</label
                    >
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="John Doe"
                        class="w-full px-4 py-2 border rounded focus:outline-none"
                    />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700" for="email"
                        >Email</label
                    >
                    <input
                        id="email"
                        type="text"
                        name="email"
                        value="john@gmail.com"
                        class="w-full px-4 py-2 border rounded focus:outline-none"
                    />
                </div>
                <button
                    type="submit"
                    class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none"
                >
                    Save
                </button>
            </form>
        </div>

        <!-- My Jobs -->
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <h3 class="text-3xl text-center font-bold mb-4">
                My Job Jobs
            </h3>
            <!-- Job 1 -->
            <div
                class="flex justify-between items-center border-b-2 border-gray-200 py-2"
            >
                <div>
                    <h3 class="text-xl font-semibold">
                        Software Engineer
                    </h3>
                    <p class="text-gray-700">Full Time</p>
                </div>
                <div class="flex gap-3">
                    <a
                        href="edit-job.html"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm"
                        >Edit</a
                    >
                    <form method="POST">
                        <button
                            type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm"
                        >
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            <!-- Job 2 -->
            <div
                class="flex justify-between items-center border-b-2 border-gray-200 py-2"
            >
                <div>
                    <h3 class="text-xl font-semibold">Data Analyst</h3>
                    <p class="text-gray-700">Full Time</p>
                </div>
                <div class="flex gap-3">
                    <a
                        href="edit-job.html"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm"
                        >Edit</a
                    >
                    <form method="POST">
                        <button
                            type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm"
                        >
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            <!-- Job 3 -->
            <div
                class="flex justify-between items-center border-b-2 border-gray-200 py-2"
            >
                <div>
                    <h3 class="text-xl font-semibold">
                        Graphic Designer
                    </h3>
                    <p class="text-gray-700">Full Time</p>
                </div>
                <div class="flex gap-3">
                    <a
                        href="edit-job.html"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm"
                        >Edit</a
                    >
                    <form method="POST">
                        <button
                            type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm"
                        >
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout> 
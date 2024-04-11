<x-layout>

    <div class="container mx-auto mt-8 p-4">
        <div class="flex flex-col md:flex-row">
            <!-- Profile Image -->
            <div class="md:w-1/4 text-center mb-4 md:mb-0">
                <img src="{{ $user->profile_image ?? 'default-profile-image.jpg' }}" alt="{{ $user->name }}"
                    class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                <p class="text-gray-600">{{ $user->name }}</p>
                <p class="text-gray-500">{{ '@' . $user->username }}</p>
            </div>

            <!-- Profile Information -->
            <div class="md:w-3/4">
                <h2 class="text-2xl font-semibold mb-4">{{ $user->name }}</h2>

                <!-- Bio -->
                <div class="mb-4">
                    <p class="text-gray-700">{{ $user->bio }}</p>
                </div>

                <!-- Email and Username -->
                <div class="flex flex-col md:flex-row space-y-2 md:space-x-4 md:space-y-0 mb-4">
                    <div class="md:w-1/2">
                        <label class="text-gray-500">Email:</label>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="md:w-1/2">
                        <label class="text-gray-500">Username:</label>
                        <p>{{ '@' . $user->username }}</p>
                    </div>
                </div>

                <!-- Update Profile Form -->
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('put')

                    <!-- Update Profile Button -->
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-full inline-block">Edit Profile</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>

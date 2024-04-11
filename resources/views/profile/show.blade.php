<x-nofooter>
    <div class="max-w-md mx-auto bg-white shadow-md p-8 my-8 rounded-md">
        <h2 class="text-2xl font-bold mb-4">User Profile</h2>

        <div>
            <p class="mb-2"><strong>Username:</strong> {{ $user->username }}</p>
            <p class="mb-2"><strong>Name:</strong> {{ $user->name }}</p>
            <p class="mb-2"><strong>Email:</strong> {{ $user->email }}</p>

            @if ($user->bio)
                <p class="mb-2"><strong>Bio:</strong> {{ $user->bio }}</p>
            @endif

            <div class="mb-4">
                <p class="mb-2"><strong>Profile Image:</strong></p>
            
                <img src="{{ asset('storage/thumbnails/' . $user->profile_images) }}" alt="Profile Image" class="rounded-xl" width="50px" height="50px">
            </div>

            <a href="{{ route('profile.edit') }}" class="text-blue-500 hover:underline">Edit Profile</a>
        </div>
    </div>
</x-nofooter>

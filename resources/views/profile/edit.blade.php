<x-nofooter>
    <div class="max-w-md mx-auto bg-white shadow-md p-4 my-8 rounded-md">
        <form action="{{ route('profile.update', auth()->user()) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <x-form.input name="username" class="mb-2" />
            
            @if ($isNameFieldOptional ?? false)
                <x-form.input name="name" class="mb-2" />
            @endif

            @if ($isEmailFieldOptional ?? false)
                <x-form.input name="email" class="mb-2" />
            @endif

            @if ($isBioFieldOptional ?? false)
                <x-form.textarea name="bio" class="mb-2" />
            @endif

            @if ($isProfileImageFieldOptional ?? false)
                <x-form.input name="profile_image" type="file" class="mb-2" />
            @endif

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded mt-5">Update Profile</button>
        </form>
    </div>
</x-nofooter>

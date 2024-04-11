<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        $isNameFieldOptional = true; // Set based on your business logic
        $isEmailFieldOptional = true; // Set based on your business logic
        $isBioFieldOptional = true; // Set based on your business logic
        $isProfileImageFieldOptional = true; // Set based on your business logic

        return view('profile.edit', compact('user', 'isNameFieldOptional', 'isEmailFieldOptional', 'isBioFieldOptional', 'isProfileImageFieldOptional'));
    }

    public function update(Request $request, User $user)
    {
        // Validate the profile
        $attributes = $this->validateProfile($user);

        // Update the user
        try {
            if ($request->hasFile('profile_image')) {
                $profileImagePath = $request->file('profile_image')->store('thumbnails', 'public');
                $attributes['profile_image'] = basename($profileImagePath);
            }

            $user->update($attributes);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error updating profile. Please try again.']);
        }

        return redirect()->route('profile.show')->with('success', 'Profile Updated!');
    }

    protected function validateProfile(User $user): array
    {
        return request()->validate([
            'username' => ['sometimes', 'nullable', 'string', 'max:255', Rule::unique('users')->ignore($user)],
            'name' => $this->optionalValidation('name', 'string|max:255'),
            'email' => ['sometimes', 'nullable', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'bio' => $this->optionalValidation('bio', 'nullable|string'),
            'profile_image' => $this->optionalValidation('profile_image', 'nullable|image|max:2048'),
        ]);
    }

    protected function optionalValidation($field, $rules)
    {
        return in_array($field, request()->all()) ? $rules : '';
    }
}

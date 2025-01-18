<form  action="{{ route('profile.update') }}"
       hx-post="{{ route('profile.update') }}"
       hx-push-url="true"
       hx-swap="outerHTML"
       hx-target="#profile-info"
       hx-select="#profile-info"
       method="POST">
    @csrf
    <h1 class="text-2xl font-bold mb-6">Edit Profile</h1>
    <div class="space-y-4">
        <div>
            <label class="block font-semibold mb-1">Name</label>
            <input type="text"
                   name="name"
                   value="{{ old('name', $user->name) }}"
                   class="w-full border rounded p-2">
            @error('name', 'updateProfile')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block font-semibold mb-1">Bio</label>
            <textarea name="bio"
                      class="w-full border rounded p-2"
                      rows="4">{{ old('bio', $user->bio) }}</textarea>
            @error('bio')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block font-semibold mb-1">Location</label>
            <input type="text"
                   name="location"
                   value="{{ old('location', $user->location) }}"
                   class="w-full border rounded p-2">
            @error('location', 'updateProfile')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end space-x-4">
            <a href="{{ route('profile.show') }}"
               hx-get="{{ route('profile.show') }}"
               hx-swap="outerHTML"
               hx-target="#profile-info"
               hx-select="#profile-info"
               class="bg-gray-500 text-white px-4 py-2 rounded">
                Cancel
            </a>
            <button type="submit"

                    class="bg-blue-500 text-white px-4 py-2 rounded">
                Save Changes
            </button>
        </div>
    </div>
</form>

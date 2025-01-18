<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/htmx/2.0.4/htmx.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="flex">
    <!-- Sidebar -->
    <div class="w-64 min-h-screen bg-white shadow-lg">
        <div class="p-4">
            <h2 class="text-xl font-bold mb-4">Navigation</h2>
            <ul>
                <li class="mb-2"><a href="#" class="text-blue-600">Dashboard</a></li>
                <li class="mb-2"><a href="#" class="text-blue-600">Profile</a></li>
                <li class="mb-2"><a href="#" class="text-blue-600">Settings</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <div class="bg-white rounded-lg shadow-lg p-6" id="profile-info">
            @if(!$isEditing)
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Profile Information</h1>
                    <a href="{{ route('profile.edit') }}" class="bg-blue-500 text-white px-4 py-2 rounded"
                       hx-swap="outerHTML"
                       hx-target="#profile-info"
                       hx-select="#profile-info"
                       hx-get="{{ route('profile.edit') }}">
                        Edit Profile
                    </a>
                </div>
                <div class="space-y-4">
                    <div>
                        <h3 class="font-semibold">Name</h3>
                        <p>{{ $user->name }}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold">Bio</h3>
                        <p>{{ $user->bio }}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold">Location</h3>
                        <p>{{ $user->location }}</p>
                    </div>
                </div>
            @else
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
            @endif
        </div>
    </div>
</div>
</body>
</html>

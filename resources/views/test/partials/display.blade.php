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


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
                @include('test.partials.display')
            @else
                @include('test.partials.form')
            @endif
        </div>
    </div>
</div>
</body>
</html>

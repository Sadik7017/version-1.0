@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow mb-6">
    <div class="flex justify-between items-center mb-2">
        <div class="text-sm text-gray-500">
            <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">Dashboard</a>
            <span class="mx-1">/</span>
            <span class="text-gray-700 font-semibold">Settings</span>
        </div>
    </div>
    <h2 class="text-2xl font-semibold text-gray-800 mb-1">Settings</h2>
    <p class="text-sm text-gray-600">Manage user groups, roles, and users.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Work Groups -->
    <a href="{{ route('admin.groups.index') }}" class="block bg-white p-6 rounded-lg shadow hover:shadow-md hover:ring-2 hover:ring-blue-500 transition">
        <h3 class="text-lg font-semibold mb-2 text-gray-800">Work Groups</h3>
        <p class="text-sm text-gray-600">Organize users by team or department.</p>
    </a>

    <!-- Roles -->
    <a href="{{ route('admin.roles.index') }}" class="block bg-white p-6 rounded-lg shadow hover:shadow-md hover:ring-2 hover:ring-green-500 transition">
        <h3 class="text-lg font-semibold mb-2 text-gray-800">Roles & Permissions</h3>
        <p class="text-sm text-gray-600">Set permissions and responsibilities.</p>
    </a>

    <!-- Users -->
    <a href="{{ route('admin.users.index') }}" class="block bg-white p-6 rounded-lg shadow hover:shadow-md hover:ring-2 hover:ring-indigo-500 transition">
        <h3 class="text-lg font-semibold mb-2 text-gray-800">Users</h3>
        <p class="text-sm text-gray-600">Manage system users and access.</p>
    </a>
</div>
@endsection

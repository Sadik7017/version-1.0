@extends('layouts.admin')

@section('content')

{{-- Header --}}
<div class="bg-white p-6 rounded shadow mb-6">
    <div class="flex justify-between items-center mb-4">
        <div class="text-sm text-gray-500">
            <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">Dashboard</a>
            <span class="mx-1">/</span>
            <a href="{{ route('admin.settings.index') }}" class="text-blue-600 hover:underline">Settings</a>
            <span class="mx-1">/</span>
            <span class="text-gray-700 font-semibold">Roles</span>
        </div>
        <a href="{{ route('admin.roles.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded shadow">
            + Create Role
        </a>
    </div>

    <h2 class="text-2xl font-semibold mb-4 text-gray-800">Roles</h2>

    {{-- Search --}}
    <form method="GET" action="{{ route('admin.roles.index') }}" class="flex items-center gap-2 max-w-md mb-4">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or description..."
               class="w-full px-4 py-2 text-sm border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm rounded shadow">
            Search
        </button>
    </form>
</div>

{{-- Table --}}
<table class="w-full bg-white shadow rounded-lg overflow-hidden text-sm">
    <thead class="bg-gray-100 text-gray-700">
        <tr>
            <th class="text-left px-4 py-2">ID</th>
            <th class="text-left px-4 py-2">Name</th>
            <th class="text-left px-4 py-2">Description</th>
            <th class="text-left px-4 py-2">Permissions Type</th>
            <th class="text-left px-4 py-2">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($roles as $role)
            <tr class="border-t hover:bg-gray-50 transition">
                <td class="px-4 py-2">{{ $role->id }}</td>
                <td class="px-4 py-2">{{ $role->name }}</td>
                <td class="px-4 py-2">{{ $role->description ?? '-' }}</td>
                <td class="px-4 py-2 capitalize">
                    {{ $role->type === 'customer' ? 'Customer' : ($role->type === 'all' ? 'All' : '-') }}
                </td>
                <td class="px-4 py-2">
                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center px-4 py-4 text-gray-500">No roles found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{-- Pagination --}}
<div class="mt-4 flex justify-end">
    {{ $roles->appends(['search' => request('search')])->links() }}
</div>

@endsection

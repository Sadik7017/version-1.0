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
            <span class="text-gray-700 font-semibold">Groups</span>
        </div>
        <a href="{{ route('admin.groups.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded shadow">
            + Create Group
        </a>
    </div>

    <h2 class="text-2xl font-semibold mb-4 text-gray-800">Groups</h2>
    </div>

    {{-- Search Bar --}}
    {{-- <form method="GET" action="{{ route('admin.groups.index') }}" class="flex items-center gap-x-2 w-full max-w-md mb-4">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or description..."
               class="w-full px-4 py-2 text-sm border border-gray-300 rounded-[10px] shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm rounded-[10px] shadow">
            Search
        </button>
    </form> --}}

<div class="bg-white p-6 rounded-lg shadow-sm">
    {{-- Search and Pagination Header --}}
    <div class="flex justify-between items-center mb-4">
        {{-- Search Bar --}}
        <form method="GET" action="{{ route('admin.groups.index') }}" class="flex items-center gap-x-2 w-full max-w-md">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or description..."
                   class="w-full px-4 py-2 text-sm border border-gray-300 rounded-[10px] shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm rounded-[10px] shadow">
                Search
            </button>
        </form>

        {{-- Pagination --}}
        <div class="flex justify-end mt-4">
            {{ $groups->appends(['search' => request('search')])->links() }}
        </div>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border border-gray-200 rounded-md">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="text-left px-4 py-2">ID</th>
                    <th class=" px-4 py-2 text-right">Name</th>
                    <th class="text-right px-4 py-2">Description</th>
                    <th class="text-right px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($groups as $group)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-2 text-left">{{ $group->id }}</td>
                        <td class="px-4 py-2  font-medium text-right" >{{ $group->name }}</td>
                        <td class="text-right px-4 py-2">{{ $group->description }}</td>
                        <td class=" px-4 py-2 flex items-center gap-3 text-right">
                            {{-- Edit --}}
                            <a href="{{ route('admin.groups.edit', $group->id) }}" title="Edit" class="text-blue-600 hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6-6 3 3-6 6H9v-3z" />
                                </svg>
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('admin.groups.destroy', $group->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this group?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Delete" class="text-red-600 hover:text-red-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center px-4 py-4 text-gray-500">No groups found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

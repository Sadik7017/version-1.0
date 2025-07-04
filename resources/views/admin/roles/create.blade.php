@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow-sm max-w-xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">Create Role</h2>

    <form action="{{ route('admin.roles.store') }}" method="POST">
        @csrf

        <!-- Role Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Role Name</label>
            <input type="text" name="name" id="name" required
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2"></textarea>
        </div>

        <!-- Permission Type Dropdown -->
        <div class="mb-4">
            <label for="permission_type" class="block text-sm font-medium text-gray-700">Permission Type</label>
            <select id="permission_type" name="permission_type"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2"
                onchange="togglePermissionCheckboxes()">
                <option value="customer">Customer</option>
                <option value="all">All</option>
            </select>
        </div>

        <!-- Permissions Checkbox -->
        <div id="permissionCheckboxes" class="mb-4 space-y-2">
            <label class="block text-sm font-medium text-gray-700">Select Permissions</label>
            @foreach($permissions as $permission)
                <div>
                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="perm_{{ $permission->id }}" class="mr-2">
                    <label for="perm_{{ $permission->id }}">{{ $permission->name }}</label>
                </div>
            @endforeach
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create Role</button>
        </div>
    </form>
</div>

<script>
    function togglePermissionCheckboxes() {
        const dropdown = document.getElementById('permission_type');
        const container = document.getElementById('permissionCheckboxes');
        const checkboxes = container.querySelectorAll('input[type="checkbox"]');

        if (dropdown.value === 'all') {
            checkboxes.forEach(cb => cb.checked = true);
            container.style.display = 'none';
        } else {
            checkboxes.forEach(cb => cb.checked = false);
            container.style.display = 'block';
        }
    }

    // Call on page load
    document.addEventListener('DOMContentLoaded', togglePermissionCheckboxes);
</script>
@endsection

@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">Create New Group</h2>

    <form method="POST" action="{{ route('admin.groups.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Group Name</label>
            <input type="text" name="name" required class="mt-1 w-full border px-3 py-2 rounded" value="{{ old('name') }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" rows="3" class="mt-1 w-full border px-3 py-2 rounded">{{ old('description') }}</textarea>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('admin.groups.index') }}" class="text-gray-600 hover:underline">Cancel</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
        </div>
    </form>
</div>
@endsection

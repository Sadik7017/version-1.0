@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-semibold">Users</h2>
    <a href="#" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">+ Create User</a>
</div>

<table class="w-full bg-white shadow rounded-lg overflow-hidden">
    <thead class="bg-gray-100">
        <tr>
            <th class="text-left px-4 py-2">ID</th>
            <th class="text-left px-4 py-2">Name</th>
            <th class="text-left px-4 py-2">Email</th>
            <th class="text-left px-4 py-2">Role(s)</th>
            <th class="text-left px-4 py-2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr class="border-t">
            <td class="px-4 py-2">{{ $user->id }}</td>
            <td class="px-4 py-2">{{ $user->name }}</td>
            <td class="px-4 py-2">{{ $user->email }}</td>
            <td class="px-4 py-2">
                @foreach ($user->roles as $role)
                    <span class="inline-block text-xs bg-gray-300 rounded px-2 py-0.5 mr-1">{{ $role->name }}</span>
                @endforeach
            </td>
            <td class="px-4 py-2">
                <a href="#" class="text-yellow-600 hover:underline">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

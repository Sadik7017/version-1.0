<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
   public function index(Request $request)
{
    $search = $request->input('search');

    $groups = Group::when($search, function ($query, $search) {
        $query->where('name', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
    })->paginate(10); // <-- This is required

    return view('admin.groups.index', compact('groups'));
}



    public function create()
    {
        return view('admin.groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string', 
        ]);

        Group::create($request->only('name', 'description')); 
        return redirect()->route('admin.groups.index')->with('success', 'Group created successfully.');
    }

    public function edit(Group $group)
    {
        return view('admin.groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string', 
        ]);

        $group->update($request->only('name', 'description')); 
        return redirect()->route('admin.groups.index')->with('success', 'Group updated.');
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('admin.groups.index')->with('success', 'Group deleted.');
    }
}

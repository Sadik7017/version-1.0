<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\User;
use App\Models\Organization;

class LeadController extends Controller
{
    public function index(Request $request)
    {
    
        $query = Lead::query();

        // Optional: Add search functionality
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        // Optional: Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Pagination - this is REQUIRED for using $leads->links()
        $leads = $query->latest()->paginate(10);

        return view('admin.leads.index', compact('leads'));
    }

    public function create()
{
    // Get only users with the role 'sales'
    $users = User::where('role', 'sales')->get();

    // Get all organizations
    $organizations = Organization::all();

    return view('admin.leads.create', compact('users', 'organizations'));
}
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:leads',
            'phone'  => 'nullable|string|max:20',
            'status' => 'required'
        ]);

        Lead::create($request->all());

        return redirect()->route('admin.leads.index')->with('success', 'Lead created successfully.');
    }

    public function edit($id)
    {
        $lead = Lead::findOrFail($id);
        return view('admin.leads.edit', compact('lead'));
    }

    public function update(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);

        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:leads,email,' . $lead->id,
            'phone'  => 'nullable|string|max:20',
            'status' => 'required'
        ]);

        $lead->update($request->all());

        return redirect()->route('admin.leads.index')->with('success', 'Lead updated successfully.');
    }

    public function destroy($id)
    {
        Lead::findOrFail($id)->delete();
        return redirect()->route('admin.leads.index')->with('success', 'Lead deleted.');
     }

    }
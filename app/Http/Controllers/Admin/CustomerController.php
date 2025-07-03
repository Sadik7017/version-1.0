<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerLoginMail;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function create()
    {
        return view('admin.customer.create'); // ✅ this file must exist
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:customers,email',
        'mobile' => 'required',
    ]);

    // ✅ Generate random password
    $randomPassword = Str::random(8);

    // ✅ Save customer to DB
    $customer = Customer::create([
        'name' => $request->name,
        'email' => $request->email,
        'mobile' => $request->mobile,
        'password' => bcrypt($randomPassword),
    ]);

    // ✅ Send email to customer
    Mail::to($customer->email)->send(new CustomerLoginMail($customer, $randomPassword));

    return redirect()->route('admin.customer.index')->with('success', 'Customer created & email sent!');
}

    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers')); // ✅ this file must exist
    }
}

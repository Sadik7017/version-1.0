@extends('layouts.app')

@section('content')
<div class="card p-4 shadow">
    <h3>Welcome, {{ Auth::guard('customer')->user()->name }}</h3>
    <p>You are logged in as a customer.</p>
    <a href="{{ route('customer.logout') }}" class="btn btn-danger mt-3">Logout</a>
</div>
@endsection

@extends('layouts.admin')

@section('content')
    <h2 class="mb-3">All Customers</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Email</th><th>Mobile</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->mobile }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

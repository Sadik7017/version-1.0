@extends('layouts.admin')

@section('content')
    <h2 class="mb-3">Create Customer</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.customer.store') }}" class="w-50">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mobile (WhatsApp)</label>
            <input type="text" name="mobile" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

{{-- @extends('layouts.admin')
@section('content')
<div class="container">
    <h2>Edit Lead</h2>

    <form action="{{ route('admin.leads.update', $lead->id) }}" method="POST">
        @csrf @method('PUT')
        <input name="name" class="form-control mb-2" value="{{ $lead->name }}" required>
        <input name="email" class="form-control mb-2" value="{{ $lead->email }}" required>
        <input name="phone" class="form-control mb-2" value="{{ $lead->phone }}">
        <select name="status" class="form-control mb-2">
            <option value="New" {{ $lead->status == 'New' ? 'selected' : '' }}>New</option>
            <option value="Hot" {{ $lead->status == 'Hot' ? 'selected' : '' }}>Hot</option>
            <option value="Cold" {{ $lead->status == 'Cold' ? 'selected' : '' }}>Cold</option>
        </select>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection --}}

{{-- public function up()
{
    Schema::create('contacts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('lead_id')->constrained('leads')->onDelete('cascade');

        $table->string('name');
        $table->string('email');
        $table->string('contact_number')->nullable();

        // SAFELY define nullable FK to organizations
        $table->unsignedBigInteger('organization_id')->nullable();
        $table->foreign('organization_id')
              ->references('id')
              ->on('organizations')
              ->onDelete('set null');

        $table->timestamps();
    });
} --}}

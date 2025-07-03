<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
       Schema::create('contacts', function (Blueprint $table) {
    $table->id();

    $table->foreignId('lead_id')->constrained('leads')->onDelete('cascade');

    $table->string('name');
    $table->string('email');
    $table->string('contact_number')->nullable();

    // ✅ Define foreignId for organization_id correctly
    $table->foreignId('organization_id')->nullable()->references('id')->on('lead_products')->nullOnDelete();

    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};

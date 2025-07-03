<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('leads', function (Blueprint $table) {
        if (!Schema::hasColumn('leads', 'title')) {
            $table->string('title');
        }
        if (!Schema::hasColumn('leads', 'description')) {
            $table->text('description')->nullable();
        }
        if (!Schema::hasColumn('leads', 'source')) {
            $table->string('source')->nullable();
        }
        if (!Schema::hasColumn('leads', 'expected_close_date')) {
            $table->date('expected_close_date')->nullable();
        }
        if (!Schema::hasColumn('leads', 'type')) {
            $table->string('type')->nullable();
        }
        if (!Schema::hasColumn('leads', 'sales_owner')) {
            $table->foreignId('sales_owner')->constrained('users');
        }
        if (!Schema::hasColumn('leads', 'lead_value')) {
            $table->decimal('lead_value', 12, 2)->default(0);
        }
    });
}

public function down()
{
    Schema::table('leads', function (Blueprint $table) {
        $table->dropColumn(['title', 'description', 'source', 'expected_close_date', 'type', 'sales_owner', 'lead_value']);
    });
}

};

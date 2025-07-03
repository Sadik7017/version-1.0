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
    Schema::create('lead_products', function (Blueprint $table) {
        $table->id();

        $table->foreignId('lead_id')->constrained('leads')->onDelete('cascade');

        $table->string('product_name');
        $table->integer('quantity');
        $table->decimal('price', 10, 2);
        $table->decimal('amount', 12, 2);

        $table->timestamps();
    });
}


public function down()
{
    Schema::dropIfExists('lead_products');
}

};

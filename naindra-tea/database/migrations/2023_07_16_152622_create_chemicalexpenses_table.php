<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chemicalexpenses', function (Blueprint $table) {
            $table->id('chemicalexpenses_id');
            $table->string('date');
            $table->string('nep_date');
            $table->string('product_name');
            $table->string('rate');
            $table->string('quantity');
            $table->string('total_amount');
            $table->string('remarks');
           

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chemicalexpenses');
    }
};

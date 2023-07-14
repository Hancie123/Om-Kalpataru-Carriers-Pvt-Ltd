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
        Schema::create('tea_suppliers', function (Blueprint $table) {
            $table->id('supplier_id');
            $table->string('date');
            $table->string('nep_date');
            $table->string('plucked_time');
            $table->string('supplier_name');
            $table->string('vehicle_number');
            $table->unsignedBigInteger('tea_id');
            $table->foreign('tea_id')->references('tea_id')->on('tea_records');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tea_suppliers');
    }
};
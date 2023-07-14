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
        Schema::create('tea_records', function (Blueprint $table) {
            $table->id('tea_id');
            $table->string('date');
            $table->string('nep_date');
            $table->string('tea_kg');
            $table->string('tea_rate');
            $table->string('water_percent');
            $table->string('water_kg');
            $table->string('total_tea_kg');
            $table->string('total_amount');
            $table->string('plucked_time');
            $table->string('remarks');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tea_records');
    }
};
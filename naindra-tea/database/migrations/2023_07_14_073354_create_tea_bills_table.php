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
        Schema::create('tea_bills', function (Blueprint $table) {
            $table->id('teabill_id');
            $table->string('date');
            $table->string('nep_date');
            $table->string('wage_kg');
            $table->string('wage_amount');
            $table->string('tea_kg');
            $table->string('ot_amount');
            $table->string('total_amount');
            $table->string('remarks');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('Employees_ID')->on('employees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tea_bills');
    }
};

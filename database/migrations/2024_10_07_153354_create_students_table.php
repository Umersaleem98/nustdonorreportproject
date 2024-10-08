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
        Schema::create('students', function (Blueprint $table) {
            $table->string('qalam_id')->primary(); // Set qalam_id as primary key
            $table->string('name_of_student')->nullable();
            $table->string('father_profession')->nullable();
            $table->string('institutions')->nullable();
            $table->string('city')->nullable();
            $table->decimal('semester_1', 5, 2)->nullable(); 
            $table->decimal('semester_2', 5, 2)->nullable();
            $table->decimal('semester_3', 5, 2)->nullable();
            $table->decimal('semester_4', 5, 2)->nullable();
            $table->decimal('semester_5', 5, 2)->nullable();
            $table->decimal('semester_6', 5, 2)->nullable();
            $table->decimal('semester_7', 5, 2)->nullable();
            $table->decimal('semester_8', 5, 2)->nullable();
            $table->string('program')->nullable();
            $table->string('nust_trust_fund_donor_name')->nullable();
            $table->string('degree')->nullable();
            $table->year('year_of_admission')->nullable();
            $table->string('remarks_status')->nullable();
            $table->unsignedBigInteger('donor_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

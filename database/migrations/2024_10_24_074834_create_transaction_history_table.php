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
        Schema::create('transaction_history', function (Blueprint $table) {
            $table->id(); // SR. # (auto-increment)
            $table->date('transaction_date'); // DATE
            $table->string('mode_of_transaction'); // MODE OF TRANSACTION
            $table->decimal('amount_received', 15, 2); // AMOUNT RECEIVED
            $table->string('receipt_acknowledgement')->default('Via Email'); // RECEIPT ACKNOWLEDGEMENT
            $table->unsignedBigInteger('donor_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_history');
    }
};

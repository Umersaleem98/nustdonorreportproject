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
        Schema::table('studentss', function (Blueprint $table) {
            $table->string('images')->default('dummy.png')->after('donor_id'); // Change 'other_column' to the column after which you want to add 'images'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('studentss', function (Blueprint $table) {
            $table->dropColumn('images');
        });
    }
};

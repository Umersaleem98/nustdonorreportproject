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
            $table->string('note_of_thanks')->nullable()->after('remarks_status'); // Add after 'remarks_status' column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('studentss', function (Blueprint $table) {
            $table->dropColumn('note_of_thanks');
        });
    }
};

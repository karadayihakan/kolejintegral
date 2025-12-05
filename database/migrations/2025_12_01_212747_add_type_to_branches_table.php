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
        Schema::table('branches', function (Blueprint $table) {
            $table->string('type')->nullable()->after('slug'); // ilkokul, ortaokul, lise, genel
            $table->string('map_embed_url')->nullable()->after('address'); // Google Maps embed URL
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->dropColumn(['type', 'map_embed_url']);
        });
    }
};

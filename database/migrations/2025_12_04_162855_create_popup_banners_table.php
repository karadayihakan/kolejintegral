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
        Schema::create('popup_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // 2,3,4,5,6,7 ve 8. SINIFLAR
            $table->string('subtitle')->nullable(); // BURSLULUK
            $table->string('button_text')->nullable(); // SINAVI
            $table->string('date_text')->nullable(); // 3 OCAK 2026 CUMARTESİ
            $table->string('free_label')->default('ÜCRETSİZ'); // ÜCRETSİZ
            $table->string('application_centers_text')->nullable(); // Başvuru Merkezleri
            $table->string('website_url')->nullable(); // www.kolejintegral.com
            $table->json('branches')->nullable(); // Şubeler listesi
            $table->string('background_image')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('popup_banners');
    }
};

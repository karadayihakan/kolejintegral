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
        Schema::create('register_pdfs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Örn: "Fen Lisesi Ücret İlanı"
            $table->string('pdf_path'); // PDF dosya yolu
            $table->integer('order')->default(0); // Sıralama
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register_pdfs');
    }
};

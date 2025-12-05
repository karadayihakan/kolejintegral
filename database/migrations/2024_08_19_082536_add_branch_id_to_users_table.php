<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable()->after('id'); // Nullable yaparak bir user'ın branch'e bağlı olup olmamasını opsiyonel yapıyoruz
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade'); // Branch silinirse, userların branch_id'leri null olur
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['branch_id']);
            $table->dropColumn('branch_id');
        });
    }
};

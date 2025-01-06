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
        Schema::table('wishlist', function (Blueprint $table) {
            $table->foreign(['apartment_id'], 'apartment_id')->references(['id'])->on('apartment')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['user_id'], 'user_id')->references(['id'])->on('users')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wishlist', function (Blueprint $table) {
            $table->dropForeign('apartment_id');
            $table->dropForeign('user_id');
        });
    }
};

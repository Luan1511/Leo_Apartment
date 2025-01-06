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
        Schema::table('buyings_apartment', function (Blueprint $table) {
            $table->foreign(['apartment_id'], 'apart_id')->references(['id'])->on('apartment')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['user_id'], 'customer')->references(['id'])->on('users')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buyings_apartment', function (Blueprint $table) {
            $table->dropForeign('apart_id');
            $table->dropForeign('customer');
        });
    }
};

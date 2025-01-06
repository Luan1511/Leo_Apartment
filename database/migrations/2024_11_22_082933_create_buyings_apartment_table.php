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
        Schema::create('buyings_apartment', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->index('customer');
            $table->string('name');
            $table->integer('apartment_id')->index('apart_id');
            $table->integer('CCCD')->nullable();
            $table->string('CCCD_image')->nullable();
            $table->string('address')->nullable();
            $table->integer('phone')->nullable();
            $table->string('email')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyings_apartment');
    }
};

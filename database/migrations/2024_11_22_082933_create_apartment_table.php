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
        Schema::create('apartment', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('type');
            $table->integer('status');
            $table->integer('floor');
            $table->float('area', null, 0);
            $table->decimal('price_per_month', 10, 0)->nullable();
            $table->decimal('price_sale', 10, 0)->nullable();
            $table->string('apartment_number');
            $table->integer('bed')->nullable();
            $table->integer('bath')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartment');
    }
};

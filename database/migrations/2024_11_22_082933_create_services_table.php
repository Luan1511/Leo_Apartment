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
        Schema::create('services', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->string('description', 526)->nullable();
            $table->decimal('price', 10, 0);
            $table->enum('for_resident', ['yes', 'no'])->nullable()->default('yes');
            $table->string('image')->nullable();
            $table->decimal('rating', 5, 1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

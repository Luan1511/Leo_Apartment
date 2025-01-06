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
        Schema::create('sub_orders', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('main_order_id')->index('order_id');
            $table->integer('laptop_id')->index('laptop_id');
            $table->integer('quantity');
            $table->decimal('laptop_price', 10, 0);
            $table->decimal('total_laptop_price', 10, 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_orders');
    }
};

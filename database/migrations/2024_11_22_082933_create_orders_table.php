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
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('customer_id')->index('cus_id');
            $table->string('name');
            $table->integer('phone');
            $table->string('address', 526);
            $table->integer('status');
            $table->integer('payment_method')->index('pay_method_id');
            $table->decimal('total_price', 10);
            $table->timestamp('created_at')->useCurrentOnUpdate()->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

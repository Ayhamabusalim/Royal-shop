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
             $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade'); // Customer reference

            $table->string('order_number', 50)
                ->unique(); // Order number

            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled', 'refunded'])
                ->default('pending'); // Order status

            $table->decimal('total_amount', 10, 2); // Total order amount
            $table->decimal('tax_amount', 10, 2)->default(0.00); // Tax amount
            $table->decimal('shipping_amount', 10, 2)->default(0.00); // Shipping cost
            $table->decimal('discount_amount', 10, 2)->default(0.00); // Discount

            $table->string('currency', 3)->default('USD'); // Currency

            $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])
                ->default('pending'); // Payment status

            $table->string('payment_method', 50)->nullable(); // Payment method
            $table->text('notes')->nullable(); // Order notes

            $table->timestamp('shipped_at')->nullable(); // Shipping timestamp
            $table->timestamp('delivered_at')->nullable(); // Delivery timestamp

            $table->timestamp('created_at')->useCurrent(); // Creation timestamp
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
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

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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY

            $table->foreignId('order_id')
                ->constrained('orders')
                ->onDelete('cascade'); // Order reference

            $table->foreignId('product_id')
                ->constrained('products'); // Product reference

            $table->string('product_name', 255); // Product name at time of order
            $table->string('product_sku', 100);  // Product SKU at time of order

            $table->integer('quantity'); // Item quantity

            $table->decimal('price', 10, 2); // Item price at time of order
            $table->decimal('total', 10, 2); // Total = quantity * price

            $table->timestamp('created_at')->useCurrent(); // Creation time
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};

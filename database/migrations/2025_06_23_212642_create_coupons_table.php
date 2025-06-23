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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY

            $table->string('code', 50)->unique(); // Coupon code
            $table->enum('type', ['fixed', 'percentage']); // Discount type
            $table->decimal('value', 10, 2); // Discount value

            $table->decimal('minimum_amount', 10, 2)->nullable(); // Min order amount
            $table->integer('usage_limit')->nullable(); // Max usage allowed
            $table->integer('used_count')->default(0); // How many times used

            $table->boolean('is_active')->default(true); // Is coupon active
            $table->timestamp('starts_at')->nullable(); // Start date
            $table->timestamp('expires_at')->nullable(); // Expiry date

            $table->timestamp('created_at')->useCurrent(); // Created at
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};

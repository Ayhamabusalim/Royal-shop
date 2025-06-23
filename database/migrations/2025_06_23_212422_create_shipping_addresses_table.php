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
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY

            $table->foreignId('order_id')
                ->constrained('orders')
                ->onDelete('cascade'); // Order reference

            $table->string('first_name', 100); // Recipient first name
            $table->string('last_name', 100);  // Recipient last name
            $table->string('company', 100)->nullable(); // Company name

            $table->string('address_line_1', 255); // Address line 1
            $table->string('address_line_2', 255)->nullable(); // Address line 2

            $table->string('city', 100); // City
            $table->string('state', 100)->nullable(); // State/Province
            $table->string('postal_code', 20); // Postal code
            $table->string('country', 100); // Country
            $table->string('phone', 20)->nullable(); // Phone number

            $table->timestamp('created_at')->useCurrent(); // Creation time
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_addresses');
    }
};

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
        Schema::create('sopping_carts', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade'); // FOREIGN KEY REFERENCES users(id)

            $table->foreignId('product_id')
                  ->constrained('products')
                  ->onDelete('cascade'); // FOREIGN KEY REFERENCES products(id)

            $table->integer('quantity')->unsigned()->default(1); // NOT NULL, MIN 1
            $table->decimal('price', 10, 2); // NOT NULL
            $table->decimal('total', 10, 2); // NOT NULL

            $table->timestamp('created_at')->useCurrent(); // DEFAULT CURRENT_TIMESTAMP
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sopping_carts');
    }
};

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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT

            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade');

            $table->foreignId('subcategory_id')
                ->constrained('sub_categories')
                ->onDelete('cascade');

            $table->string('name', 255);
            $table->string('slug', 255)->unique();

            $table->longText('description')->nullable();
            $table->text('short_description')->nullable();

            $table->string('sku', 100)->unique();

            $table->decimal('price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->decimal('cost_price', 10, 2)->nullable();

            $table->integer('stock_quantity')->default(0);
            $table->integer('min_quantity')->default(1);

            $table->decimal('weight', 8, 2)->nullable();
            $table->string('dimensions', 255)->nullable();

            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->boolean('manage_stock')->default(true);

            $table->enum('stock_status', ['in_stock', 'out_of_stock', 'on_backorder'])->default('in_stock');

            $table->string('image', 255)->nullable();
            $table->json('gallery')->nullable();

            $table->string('meta_title', 255)->nullable();
            $table->text('meta_description')->nullable();

            $table->decimal('rating_average', 2, 1)->default(0.0);
            $table->integer('rating_count')->default(0);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

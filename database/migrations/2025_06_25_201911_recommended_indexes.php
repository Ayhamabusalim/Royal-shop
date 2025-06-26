<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        // 1. users: email, is_active
        Schema::table('users', function (Blueprint $table) {
            $table->index(['email', 'is_active']);
        });

        // 2. categories: slug, is_active, sort_order
        Schema::table('categories', function (Blueprint $table) {
            $table->index(['slug', 'is_active', 'sort_order']);
        });

        // 3. subcategories: category_id, slug, is_active, sort_order
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->index(['category_id', 'slug', 'is_active', 'sort_order']);
        });

        // 4. products: category_id, subcategory_id, slug, is_active, is_featured, sku
        Schema::table('products', function (Blueprint $table) {
            $table->index(['category_id', 'subcategory_id', 'slug', 'is_active', 'is_featured', 'sku']);
        });

        // 5. product_images: product_id, is_primary, sort_order
        Schema::table('product_images', function (Blueprint $table) {
            $table->index(['product_id', 'is_primary', 'sort_order']);
        });

        // 6. shopping_cart: user_id, product_id
        Schema::table('sopping_cart', function (Blueprint $table) {
            $table->index(['user_id', 'product_id']);
        });

        // 7. orders: user_id, order_number, status, created_at
        Schema::table('orders', function (Blueprint $table) {
            $table->index(['user_id', 'order_number', 'status', 'created_at']);
        });

        // 8. order_items: order_id, product_id
        Schema::table('order_items', function (Blueprint $table) {
            $table->index(['order_id', 'product_id']);
        });

        // 9. role_user: role_id, user_id
        Schema::table('role_user', function (Blueprint $table) {
            $table->index(['role_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['email', 'is_active']);
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex(['slug', 'is_active', 'sort_order']);
        });

        Schema::table('sub_categories', function (Blueprint $table) {
            $table->dropIndex(['category_id', 'slug', 'is_active', 'sort_order']);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex(['category_id', 'subcategory_id', 'slug', 'is_active', 'is_featured', 'sku']);
        });

        Schema::table('product_images', function (Blueprint $table) {
            $table->dropIndex(['product_id', 'is_primary', 'sort_order']);
        });

        Schema::table('sopping_cart', function (Blueprint $table) {
            $table->dropIndex(['user_id', 'product_id']);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex(['user_id', 'order_number', 'status', 'created_at']);
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->dropIndex(['order_id', 'product_id']);
        });

        Schema::table('role_user', function (Blueprint $table) {
            $table->dropIndex(['role_id', 'user_id']);
        });
    }
};

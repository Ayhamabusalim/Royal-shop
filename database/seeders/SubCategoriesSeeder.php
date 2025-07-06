<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $subcategoriesData = [
            'Electronics' => [
                ['name' => 'Smartphones', 'image' => 'smartphones.jpg'],
                ['name' => 'Laptops', 'image' => 'laptops.jpg'],
                ['name' => 'Cameras', 'image' => 'cameras.jpg'],
                ['name' => 'Headphones', 'image' => 'headphones.jpg'],
                ['name' => 'Wearables', 'image' => 'wearables.jpg'],
            ],
            'Clothing' => [
                ['name' => 'Men\'s Clothing', 'image' => 'mens-clothing.jpg'],
                ['name' => 'Women\'s Clothing', 'image' => 'womens-clothing.jpg'],
                ['name' => 'Kids\' Clothing', 'image' => 'kids-clothing.jpg'],
                ['name' => 'Footwear', 'image' => 'footwear.jpg'],
            ],
            'Books' => [
                ['name' => 'Fiction', 'image' => 'fiction.jpg'],
                ['name' => 'Non-fiction', 'image' => 'non-fiction.jpg'],
                ['name' => 'Comics', 'image' => 'comics.jpg'],
                ['name' => 'Academic', 'image' => 'academic.jpg'],
                ['name' => 'Biographies', 'image' => 'biographies.jpg'],
            ],
            'Home & Kitchen' => [
                ['name' => 'Furniture', 'image' => 'furniture.jpg'],
                ['name' => 'Appliances', 'image' => 'appliances.jpg'],
                ['name' => 'Cookware', 'image' => 'cookware.jpg'],
                ['name' => 'Decor', 'image' => 'decor.jpg'],
            ],
            'Toys & Games' => [
                ['name' => 'Educational Toys', 'image' => 'educational-toys.jpg'],
                ['name' => 'Board Games', 'image' => 'board-games.jpg'],
                ['name' => 'Outdoor Toys', 'image' => 'outdoor-toys.jpg'],
                ['name' => 'Action Figures', 'image' => 'action-figures.jpg'],
            ],
            'Beauty & Personal Care' => [
                ['name' => 'Makeup', 'image' => 'makeup.jpg'],
                ['name' => 'Skincare', 'image' => 'skincare.jpg'],
                ['name' => 'Haircare', 'image' => 'haircare.jpg'],
                ['name' => 'Fragrances', 'image' => 'fragrances.jpg'],
            ],
            'Sports & Outdoors' => [
                ['name' => 'Fitness Equipment', 'image' => 'fitness-equipment.jpg'],
                ['name' => 'Outdoor Gear', 'image' => 'outdoor-gear.jpg'],
                ['name' => 'Athletic Apparel', 'image' => 'athletic-apparel.jpg'],
            ],
            'Automotive' => [
                ['name' => 'Car Accessories', 'image' => 'car-accessories.jpg'],
                ['name' => 'Motor Oils', 'image' => 'motor-oils.jpg'],
                ['name' => 'Tools & Equipment', 'image' => 'tools-equipment.jpg'],
            ],
            'Health & Household' => [
                ['name' => 'Supplements', 'image' => 'supplements.jpg'],
                ['name' => 'Medical Supplies', 'image' => 'medical-supplies.jpg'],
                ['name' => 'Cleaning Products', 'image' => 'cleaning-products.jpg'],
            ],
            'Pet Supplies' => [
                ['name' => 'Dog Supplies', 'image' => 'dog-supplies.jpg'],
                ['name' => 'Cat Supplies', 'image' => 'cat-supplies.jpg'],
                ['name' => 'Pet Food', 'image' => 'pet-food.jpg'],
                ['name' => 'Aquarium', 'image' => 'aquarium.jpg'],
            ],
        ];


        // جلب أسماء التصنيفات الرئيسية مع معرفاتها
        $categoryMap = DB::table('categories')->pluck('id', 'name');

        foreach ($subcategoriesData as $categoryName => $subList) {
            $categoryId = $categoryMap[$categoryName] ?? null;

            if (!$categoryId) continue;

            foreach ($subList as $index => $sub) {
                $name = $sub['name'];
                $image = $sub['image'];
                $slug = Str::slug($name);

                DB::table('sub_categories')->insert([
                    'category_id' => $categoryId,
                    'name' => $name,
                    'slug' => $slug,
                    'description' => null,
                    'image' => $image, // فقط الاسم، مثل: smartphones.jpg
                    'is_active' => true,
                    'sort_order' => $index + 1,
                    'meta_title' => $name,
                    'meta_description' => 'Browse our selection of ' . $name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

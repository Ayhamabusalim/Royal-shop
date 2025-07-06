<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Electronics',
                'image' => 'electronics.jpg',
                'description' => 'Devices, gadgets, and accessories.',
                'meta_title' => 'Shop Electronics Online',
                'meta_description' => 'Find top deals on electronics including phones, TVs, and more.',
                'sort_order' => 1
            ],
            [
                'name' => 'Clothing',
                'image' => 'clothing.jpg',
                'description' => 'Men’s, Women’s, and Kids’ fashion.',
                'meta_title' => 'Trendy Clothing for All',
                'meta_description' => 'Discover the latest fashion trends and styles.',
                'sort_order' => 2
            ],
            [
                'name' => 'Books',
                'image' => 'books.jpg',
                'description' => 'All genres including fiction, non-fiction, academic.',
                'meta_title' => 'Books & Literature',
                'meta_description' => 'Explore thousands of books across all categories.',
                'sort_order' => 3
            ],
            [
                'name' => 'Home & Kitchen',
                'image' => 'home-kitchen.jpg',
                'description' => 'Appliances, furniture, and décor.',
                'meta_title' => 'Home and Kitchen Essentials',
                'meta_description' => 'Upgrade your home with our curated kitchen and furniture collection.',
                'sort_order' => 4
            ],
            [
                'name' => 'Toys & Games',
                'image' => 'toys-games.jpg',
                'description' => 'Toys for all ages and fun board games.',
                'meta_title' => 'Toys & Games for Everyone',
                'meta_description' => 'Browse toys, puzzles, and games for kids and adults.',
                'sort_order' => 5
            ],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'image' => $category['image'], // فقط الاسم، والصورة يجب أن تكون في public/images/categories/
                'is_active' => true,
                'sort_order' => $category['sort_order'],
                'meta_title' => $category['meta_title'],
                'meta_description' => $category['meta_description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

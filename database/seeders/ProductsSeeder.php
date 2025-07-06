<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $categories = DB::table('categories')->pluck('id', 'name');
        $subCategories = DB::table('sub_categories')->get()->groupBy('category_id');

        $productCount = 100;
        $usedSkus = [];

        // تأكد من وجود مجلد الصور
        if (!file_exists(public_path('images/products'))) {
            mkdir(public_path('images/products'), 0755, true);
        }

        for ($i = 0; $i < $productCount; $i++) {
            $categoryName = $categories->keys()->random();
            $categoryId = $categories[$categoryName];

            $subCategory = $subCategories[$categoryId]->random();

            $productName = $faker->words(3, true);
            $sku = strtoupper(Str::random(8));
            while (in_array($sku, $usedSkus)) {
                $sku = strtoupper(Str::random(8));
            }
            $usedSkus[] = $sku;

            $price = $faker->randomFloat(2, 20, 500);
            $salePrice = $faker->boolean(50) ? $faker->randomFloat(2, 15, $price - 1) : null;

            // تحميل صورة واحدة
            $imageUrl = 'https://picsum.photos/seed/product' . $i . '/400/400';
            $imageName = 'product_' . $i . '_' . Str::random(5) . '.jpg';
            $imagePath = public_path('images/products/' . $imageName);
            $response = Http::get($imageUrl);
            if ($response->ok()) {
                file_put_contents($imagePath, $response->body());
            }

            // تحميل صور المعرض
            $galleryImages = [];
            foreach (['a', 'b', 'c'] as $suffix) {
                $galleryUrl = 'https://picsum.photos/seed/gallery' . $i . $suffix . '/600/600';
                $galleryName = 'product_' . $i . '_' . $suffix . '_' . Str::random(5) . '.jpg';
                $galleryPath = public_path('images/products/' . $galleryName);

                $galleryResponse = Http::get($galleryUrl);
                if ($galleryResponse->ok()) {
                    file_put_contents($galleryPath, $galleryResponse->body());
                    $galleryImages[] = $galleryName;
                }
            }

            DB::table('products')->insert([
                'category_id' => $categoryId,
                'subcategory_id' => $subCategory->id,

                'name' => $productName,
                'slug' => Str::slug($productName) . '-' . Str::random(5),

                'description' => $faker->paragraphs(3, true),
                'short_description' => $faker->sentence(),

                'sku' => $sku,

                'price' => $price,
                'sale_price' => $salePrice,
                'cost_price' => $faker->randomFloat(2, 10, $price - 5),

                'stock_quantity' => $faker->numberBetween(10, 100),
                'min_quantity' => 1,

                'weight' => $faker->randomFloat(2, 0.2, 5),
                'dimensions' => $faker->randomElement(['10x20x30', '15x15x15', '25x10x8']),

                'is_active' => true,
                'is_featured' => $faker->boolean(20),
                'manage_stock' => true,

                'stock_status' => $faker->randomElement(['in_stock', 'out_of_stock', 'on_backorder']),

                'image' => $imageName,
                'gallery' => json_encode($galleryImages),

                'meta_title' => $productName,
                'meta_description' => $faker->sentence(),

                'rating_average' => $faker->randomFloat(1, 3, 5),
                'rating_count' => $faker->numberBetween(0, 500),

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

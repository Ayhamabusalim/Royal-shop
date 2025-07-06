<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'subcategory_id',
        'slug',
        'meta_title',
        'meta_description',
        'short_description',
        'description',
        'image',
        'gallery',
        'price',
        'sale_price',
        'cost_price',
        'sku',
        'stock_quantity',
        'min_quantity',
        'is_active',
        'stock_status',
        'is_featured'
    ];
    use HasFactory;
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
   
    protected $fillable=['category_id','name','description','meta_title','meta_description','slug','image'];

    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

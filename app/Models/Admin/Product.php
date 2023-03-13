<?php

namespace App\Models\Admin;

use App\Models\Admin\Category;
use App\Models\Frontend\Review;
use App\Models\Admin\ProductColor;
use App\Models\Admin\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'title_en', 'title_ar', 'slug', 'category_id', 'brand', 'original_price',
        'selling_price', 'quantity', 'small_desc_en', 'long_desc_en', 'small_desc_ar', 'long_desc_ar',
        'meta_title', 'trending', 'featured', 'status'
    ];

    public function category()
    {
        return $this->beLongsTo(Category::class, 'category_id', 'id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function productColors()
    {
        return $this->hasMany(ProductColor::class, 'product_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }
}

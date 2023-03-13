<?php

namespace App\Models\Admin;

use App\Models\Admin\Product;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name_en', 'name_ar','slug', 'parent_id','image', 'status', 'meta_title',
    ];

    public function parent()
    {
        return $this->beLongsTo(Category::class, 'parent_id');
    }

    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, Category::class, 'parent_id', 'category_id', 'id');
    }

    public function categoryProducts()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}

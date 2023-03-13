<?php

namespace App\Models\Frontend;

use App\Models\User;
use App\Models\Admin\Product;
use App\Models\Admin\ProductColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'user_id', 'email', 'product_id', 'product_color_id', 'price', 'quantity',
    ];

    public function user()
    {
        return $this->beLongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->beLongsTo(Product::class, 'product_id', 'id');
    }

    public function productColor()
    {
        return $this->beLongsTo(ProductColor::class, 'product_color_id', 'id');
    }
}

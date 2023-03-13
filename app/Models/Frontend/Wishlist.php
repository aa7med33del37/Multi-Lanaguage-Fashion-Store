<?php

namespace App\Models\Frontend;

use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlists';
    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public function product()
    {
        return $this->beLongsTo(Product::class, 'product_id', 'id');
    }
}

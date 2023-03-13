<?php

namespace App\Models\Frontend;

use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItems extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [
        'order_id', 'product_id', 'product_color_id', 'quantity', 'price',
    ];
    public function product()
    {
        return $this->beLongsTo(Product::class, 'product_id', 'id');
    }
}

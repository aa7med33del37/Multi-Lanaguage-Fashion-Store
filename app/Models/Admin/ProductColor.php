<?php

namespace App\Models\Admin;

use App\Models\Admin\Size;
use App\Models\Admin\Color;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductColor extends Model
{
    use HasFactory;
    protected $table = 'product_colors';
    protected $fillable = [ 'color_id', 'product_id', 'quantity', 'status', ];

    public function color()
    {
        return $this->beLongsTo(Color::class, 'color_id', 'id');
    }

    public function size()
    {
        return $this->beLongsTo(Size::class, 'size_id', 'id');
    }
}

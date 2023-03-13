<?php

namespace App\Models\Frontend;

use App\Models\Admin\Product;
use App\Models\Frontend\City;
use App\Models\Frontend\OrderItems;
use App\Models\Frontend\Governorate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id', 'email', 'name', 'phone', 'address', 'governorate_id','city',
        'pincode', 'company', 'notes', 'tracking_no', 'status_message', 'payment_mode', 'out_for_delivery_date', 'delivered_date',
    ];

    public function items()
    {
        return $this->hasMany(OrderItems::class, 'order_id', 'id');
    }

    public function governorate()
    {
        return $this->beLongsTo(Governorate::class, 'governorate_id', 'id');
    }

    public function govCity()
    {
        return $this->beLongsTo(City::class, 'city', 'id');
    }
}

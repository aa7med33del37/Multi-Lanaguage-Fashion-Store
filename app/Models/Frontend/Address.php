<?php

namespace App\Models\Frontend;

use App\Models\Frontend\City;
use App\Models\Frontend\Governorate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $fillable = [
        'user_id', 'email', 'name', 'phone', 'address', 'governorate_id','city',
        'pincode', 'company',
    ];

    public function governorate()
    {
        return $this->beLongsTo(Governorate::class, 'governorate_id', 'id');
    }

    public function govCity()
    {
        return $this->beLongsTo(City::class, 'city', 'id');
    }
}

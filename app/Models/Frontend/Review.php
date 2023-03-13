<?php

namespace App\Models\Frontend;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'user_id',
        'product_id',
        'review',
        'comment',
        'like',
        'unlike',
        'rating',
        'status',
    ];

    public function user()
    {
        return $this->beLongsTo(User::class, 'user_id', 'id');
    }
}

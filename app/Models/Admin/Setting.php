<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        'website_name', 'website_url', 'logo', 'favicon', 'page_title',
        'phone', 'phone2', 'email', 'email2', 'address_en', 'address_ar',
        'facebook', 'twitter', 'instagram', 'youtube', 'about_en', 'about_ar',
    ];
}

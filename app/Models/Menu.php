<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;

    /**
     * @var string Fillable fields
     */
    protected $fillable = [
        'slug',
        'brand_name',
        'brand_slogan',
        'phone_number',
        'email',
        'address',
        'header_bg_color',
        'header_text_color',
        'body_bg_color',
        'body_text_color',
        'footer_bg_color',
        'footer_text_color',
        'logo',
        'favicon',
        'logo_width',
        'logo_height',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'youtube_link',
        'tiktok_link',
    ];

    public function menuCategory(): HasMany
    {
        return $this->hasMany(MenuCategory::class, 'menu_id');
    }
}

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
        'brand_name',
        'brand_slogan',
        'phone_number',
        'email',
        'address',
        'primary_color',
        'secondary_color',
        'tertiary_color',
        'accent_color',
        'background_color',
        'text_color',
        'link_color',
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
        return $this->hasMany(MenuCategory::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuItem extends Model
{
    use HasFactory;

    /**
     * @var string Fillable fields
     */
    protected $fillable = [
        'name',
        'description',
        'order',
        'is_visible',
        'available_from',
        'available_to',
        'category_id',
    ];

    public function menuCategory(): BelongsTo
    {
        return $this->belongsTo(MenuCategory::class, 'category_id');
    }
}

<?php

namespace App\Models;

use App\Models\Menu as MenuModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuCategory extends Model
{
    use HasFactory;

    /**
     * @var string Fillable fields
     */
    protected $fillable = [
        'name',
        'description',
        'menu_id'
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('team', function (Builder $query) {
            if (auth()->check()) {
                $query->where('team_id', auth()->user()->team_id);
                // or with a `team` relationship defined:
                $query->whereBelongsTo(auth()->user()->team);
            }
        });
    }

    public function menus(): BelongsTo
    {
        return $this->belongsTo(MenuModel::class, 'menu_id');
    }

    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}

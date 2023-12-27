<?php

namespace App\Models;

use App\Models\Menu as MenuModel;
use Illuminate\Database\Eloquent\Builder;
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
        'menu_category_id',
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

    public function isVisible(): bool
    {
        // If the available_from or available_to is null, set it to 10 years ago
        $this->available_from = $this->available_from ?? now()->subYears(10);
        $this->available_to   = $this->available_to ?? now()->addYears(10);

        // Check to see if the
        $now = now();

        if ($now->between($this->available_from, $this->available_to)) {
            return $this->is_visible;
        } else {
            return false;
        }
    }

    public function menus(): BelongsTo
    {
        return $this->belongsTo(MenuModel::class, 'menu_id');
    }

    public function menuCategory(): BelongsTo
    {
        return $this->belongsTo(MenuCategory::class, 'menu_category_id');
    }
}

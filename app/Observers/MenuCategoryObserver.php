<?php

namespace App\Observers;

use App\Models\MenuCategory;

class MenuCategoryObserver
{
    /**
     * Handle the MenuCategory "created" event.
     */
    public function created(MenuCategory $menuCategory): void
    {
        //
    }

    /**
     * Handle the Menu "creating" event.
     */
    public function creating(Post $post): void
    {
        if (auth()->check()) {
            $post->team_id = auth()->user()->team_id;
            // or with a `team` relationship defined:
            $post->team()->associate(auth()->user()->team);
        }
    }

    /**
     * Handle the MenuCategory "updated" event.
     */
    public function updated(MenuCategory $menuCategory): void
    {
        //
    }

    /**
     * Handle the MenuCategory "deleted" event.
     */
    public function deleted(MenuCategory $menuCategory): void
    {
        //
    }

    /**
     * Handle the MenuCategory "restored" event.
     */
    public function restored(MenuCategory $menuCategory): void
    {
        //
    }

    /**
     * Handle the MenuCategory "force deleted" event.
     */
    public function forceDeleted(MenuCategory $menuCategory): void
    {
        //
    }
}

<?php

namespace App\Observers;

use App\Models\MenuItem;

class MenuItemObserver
{
    /**
     * Handle the MenuItem "created" event.
     */
    public function created(MenuItem $menuItem): void
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
     * Handle the MenuItem "updated" event.
     */
    public function updated(MenuItem $menuItem): void
    {
        //
    }

    /**
     * Handle the MenuItem "deleted" event.
     */
    public function deleted(MenuItem $menuItem): void
    {
        //
    }

    /**
     * Handle the MenuItem "restored" event.
     */
    public function restored(MenuItem $menuItem): void
    {
        //
    }

    /**
     * Handle the MenuItem "force deleted" event.
     */
    public function forceDeleted(MenuItem $menuItem): void
    {
        //
    }
}

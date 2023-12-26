<?php

namespace App\Livewire;

use App\Models\Menu as MenuModel;
use Livewire\Component;

class Menu extends Component
{
    public $menu = null;

    public function render()
    {
        // Get the menu from the route
        // Retrieve the menu name from the URL
        $menuSlug = request()->route('menuSlug');
        // If there's no slug, redirect to the homepage
        if (!$menuSlug) {
            return redirect('/');
        }

        // Get the menu from the database
        $this->menu = MenuModel::where('slug', $menuSlug)->first();
        return view('livewire.menu');
    }
}

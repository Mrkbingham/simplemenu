<?php

use App\Livewire\Menu;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // Re-route the the /app route
    return redirect('/app');
});

// Set a route for /menu/{menu-name}
Route::get('/menu/{menuSlug}', Menu::class);

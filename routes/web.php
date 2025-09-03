<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Order;
use App\Enums\OrderStatus;
use App\Http\Middleware\HandleRoles;

Route::get('/', function() {
    return Inertia::render('Orders');
})->middleware([HandleRoles::class.':logistics_manager', 'auth']);

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

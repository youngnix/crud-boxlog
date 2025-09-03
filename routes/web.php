<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Order;
use App\Enums\OrderStatus;
use App\Http\Middleware\HandleRoles;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/orders', function() {
    return Inertia::render('Orders', [
        "orders" => Order::all(),
        "statuses" => array_column(OrderStatus::cases(), 'value'),
    ]);
})->middleware([HandleRoles::class.':logistics_manager', 'auth']);

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

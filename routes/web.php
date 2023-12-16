<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing-page.index');
});

require __DIR__ . '/auth.php';

Route::resource('/orders', OrderController::class)->middleware(['auth']);
Route::resource('/booking', BookingController::class)->middleware(['auth']);
Route::resource('/profile', ProfileController::class)->middleware('auth');
Route::resource('/account', ProfileController::class)->middleware('auth');
Route::resource('/dashboard', DashboardController::class)->middleware('auth');

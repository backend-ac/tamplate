<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;

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

// Single-language mode will ignore locale prefixes in controller logic
Route::middleware('setLocaleFromSettings')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/{locale}', [HomeController::class, 'index'])
        ->where('locale', '^[a-zA-Z]{2}$')
        ->name('home.localized');
});

Route::get('/migrate', function () {
    Artisan::call('migrate');
    return redirect()->back();
});

Route::get('/seed', function () {
    Artisan::call('db:seed');
    return redirect()->back();
});

Route::get('/link', function () {
    Artisan::call('storage:link');
    return redirect()->back();
});
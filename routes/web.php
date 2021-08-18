<?php

// use App\Http\Controllers;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::middleware('auth')->group(function() {
    Route::resource('/admin/services', App\Http\Controllers\Admin\ServicesController::class);
    Route::resource('/admin/portfolio', App\Http\Controllers\Admin\PortfolioController::class);
    Route::resource('/admin/settings', App\Http\Controllers\Admin\SettingsController::class)->except(['settings.create', 'settings.index', 'settings.delete']);
});


Route::get('/', [App\Http\Controllers\PublicController::class, 'getFront'])->name('front');

Route::get('/about', [App\Http\Controllers\PublicController::class, 'getAbout'])->name('about');
Route::get('/services', [App\Http\Controllers\PublicController::class, 'getServices'])->name('services');
Route::get('/portfolio', [App\Http\Controllers\PublicController::class, 'getPortfolio'])->name('portfolio');
Route::get('/contact', [App\Http\Controllers\PublicController::class, 'getContact'])->name('contact');

Route::get('/dashboard', function (Request $request) {
    return view('dashboard', [
        'setting' => $request->user()->setting
    ]);
})->middleware(['auth'])->name('dashboard');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

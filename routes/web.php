<?php

// use App\Http\Controllers;
use App\Http\Controllers\PublicController;
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

Route::middleware('auth')->group(function() {
    Route::resource('/admin/services', App\Http\Controllers\Admin\ServicesController::class);
});


Route::get('/', [App\Http\Controllers\PublicController::class, 'getFront'])->name('front');

Route::get('/about', [App\Http\Controllers\PublicController::class, 'getAbout'])->name('about');
Route::get('/services', [App\Http\Controllers\PublicController::class, 'getServices'])->name('services');
Route::get('/portfolio', [App\Http\Controllers\PublicController::class, 'getPortfolio'])->name('portfolio');
Route::get('/contact', [App\Http\Controllers\PublicController::class, 'getContact'])->name('contact');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

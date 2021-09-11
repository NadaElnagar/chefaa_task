<?php

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
    return view('welcome');
});
Route::resource('products', \App\Http\Controllers\ProductsControllers::class);
Route::resource('pharmacies', \App\Http\Controllers\PharmaciesControllers::class);
Route::resource('pharmacies_products', \App\Http\Controllers\PharmaciesProductsControllers::class);

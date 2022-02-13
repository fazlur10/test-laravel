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

use App\Http\Controllers\ZoneController;
Route::resource('zone', ZoneController::class);

use App\Http\Controllers\RegionController;
Route::resource('region', RegionController::class);

use App\Http\Controllers\TerritoryController;
Route::post('api/fetch-regions', [TerritoryController::class, 'fetchRegion']);
Route::resource('territory', TerritoryController::class);

use App\Http\Controllers\UserController;
Route::resource('user', UserController::class);

use App\Http\Controllers\ProductController;
Route::resource('product', ProductController::class);

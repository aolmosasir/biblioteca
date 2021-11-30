<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'getHome']);

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::name('show')->get('/catalog/show/{id}', [App\Http\Controllers\CatalogController::class, 'getShow']);
    Route::get('/catalog/create', [App\Http\Controllers\CatalogController::class, 'getCreate']);
    Route::get('/catalog/edit/{id}', [App\Http\Controllers\CatalogController::class, 'getEdit']);
    Route::post('/catalog/create', [App\Http\Controllers\CatalogController::class, 'postCreate']);
    Route::put('/catalog/edit/{id}', [App\Http\Controllers\CatalogController::class, 'putEdit']);
    Route::put('/catalog/rent/{id}', [App\Http\Controllers\CatalogController::class, 'putRent']);
    Route::put('/catalog/return/{id}', [App\Http\Controllers\CatalogController::class, 'putReturn']);
    Route::delete('/catalog/delete/{id}', [App\Http\Controllers\CatalogController::class, 'deleteMovie']);
    Route::name('catalog')->get('/catalog', [App\Http\Controllers\CatalogController::class, 'getIndex']);
});





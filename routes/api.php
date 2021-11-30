<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APICatalogController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/catalog', [App\Http\Controllers\APICatalogController::class, 'index']);
Route::get('/v1/catalog/{id}', [App\Http\Controllers\APICatalogController::class, 'show']);

Route::group(['middleware' => 'auth.basic.once'], function() {
    Route::post('/v1/catalog', [App\Http\Controllers\APICatalogController::class, 'store']);
    Route::put('/v1/catalog/{id}', [App\Http\Controllers\APICatalogController::class, 'update']);
    Route::delete('/v1/catalog/{id}', [App\Http\Controllers\APICatalogController::class, 'destroy']);
    Route::put('/v1/catalog/{id}/rent', [App\Http\Controllers\APICatalogController::class, 'putRent']);
    Route::put('/v1/catalog/{id}/return', [App\Http\Controllers\APICatalogController::class, 'putReturn']);
});
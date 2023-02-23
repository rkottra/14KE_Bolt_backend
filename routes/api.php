<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



use App\Http\Controllers\UserControl;
use App\Http\Middleware\TokenRefresh;
Route::post('/login', [UserControl::class, 'login']);
Route::post('/logout', [UserControl::class, 'logout'])->middleware(['auth:sanctum']);
Route::get('/dashboard', [UserControl::class, 'dashboard'])->middleware(['auth:sanctum', TokenRefresh::class]);
Route::post('/register', [UserControl::class, 'store']);

use App\Http\Controllers\TermekController;
use App\Http\Controllers\KategoriaController;

Route::resource("termek", TermekController::class)->except("edit","create");

Route::resource("kategoria", KategoriaController::class)->only("index");
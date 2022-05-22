<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FluentString;

define('URL', '/products/{id}');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/new',[ProductController::class , 'test']);
Route::get('/another',[ProductController::class , 'newTest']);

// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::post('/products', [ProductController::class, 'store']);
//     Route::put(URL, [ProductController::class, 'update']);
//     Route::delete(URL, [ProductController::class, 'destroy']);
//     Route::post('/logout', [AuthController::class, 'logout']);
// });
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/products/{id}', [ProductController::class, 'show']);
// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products/search/{name}', [ProductController::class, 'search']);
//
// Route::get('/flutenstring', [FluentString::class, 'index']);

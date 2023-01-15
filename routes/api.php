<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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
Route::middleware('auth:sanctum')->post('logout', [AuthenticatedSessionController::class, 'destroy']);

//////////////////////////////////////////////// PUBLIC ROUTES //////////////////////////////////////////////// 
Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('login', [AuthenticatedSessionController::class, 'store']);

// // categories
// Route::get('categories', [CategoryController::class, 'index']);

// // posts
// Route::get('home-posts', [HomeController::class, 'index']);
// Route::get('posts/{post:slug}', [PostController::class, 'show']);
// Route::get('posts', [PostController::class, 'index']);
// Route::get('related-posts/{post:slug}', [RelatedPostController::class, 'index']);
// Route::get('dashboard-posts', [DashboardPostController::class, 'index']);

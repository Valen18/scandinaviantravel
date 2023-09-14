<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PostController;
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

Route::view('/', 'welcome')->name('home');

// Routes of model Car
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/car/show/{id}', [CarController::class, 'show'])->name('car.show');

// Routes of model Authors
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/author/show/{id}', [AuthorController::class, 'show'])->name('author.show');

// Routes of model Locations
Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
Route::get('/location/show/{id}', [LocationController::class, 'show'])->name('location.show');

// Routes of model Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/post/show/{id}', [PostController::class, 'show'])->name('post.show');


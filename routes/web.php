<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
// use

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

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing


Route::get('/', [ListingController::class, 'index']);

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

Route::get('/listings/{listing}', [ListingController::class, 'show']);

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');



// Users
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::get('/login', [UserController::class, 'loginPage'])->name('login')->middleware('guest');

Route::post('/users', [UserController::class, 'store']);

Route::post('/users/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout']);

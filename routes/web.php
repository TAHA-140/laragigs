<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
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

// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::get('/hello', function () {
//     return 'view() and hello world';
// });

// Route::get('/posts/{id}', function ($id) {
//     return response('Post '. $id);
// })-> where('id', '[0-9]+');


// Route::get('/search', function (Request $request) {
//     return $request -> name . ' ' . $request -> city;
// });

//=============================================
// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing
//=============================================

// All Listings .
//Explaination it will get the method index from the class ListingController.
Route::get('/', [ListingController::class, 'index']);

// Show create form.
//Explaination it will get the method create from the class ListingController.
Route::get('listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data.
//Explaination it will get the method store from the class ListingController.
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form.
//Explaination it will get the method edit from the class ListingController.
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing. (Edit Submit to Update)
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing.
//Explaination it will get the method destroy from the class ListingController.
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listings
//Explaination it will get the method manage from the class ListingController.
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Single Listing.
//Explaination it will get the method show from the class ListingController.
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register/Create Form
//Explaination it will get the method create from the class UserController.
Route::get('register', [UserController::class, 'create'])->middleware('guest');

// Create New User
//Explaination it will post the method store from the class UserController.
Route::post('/users', [UserController::class, 'store']);

// Log User Out
//Explaination it will post the method logout from the class UserController.
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
////Explaination it will get the method login from the class UserController.
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Show Login User
//Explaination it will post the method authenticate from the class UserController.
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Like
Route::post('/listings/{listing}/like', [ListingController::class, 'toggleLike'])->name('listing.toggleLike');



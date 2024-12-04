<?php

use App\Models\Listing;
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

// Get The Stored Data From Listing Model.
Route::get('/', function () {
    return Listing::all();
});
// Post a Data To The Listing Model.
Route::post('/', function () {
    return Listing::create([
        "id" => 18,
        "user_id" => 2,
        "title" => "Junior Laravel Developer",
        "logo" => "logos/4DsUlNy9JNdSrlzU4qYsjgteYkzwy3aHiZAnuJTA.png",
        "tags" => "laravel, javascript, backend",
        "company" => "Wonka Industries",
        "location" => "Miami, FL",
        "email" => "email4@email.com",
        "website" => "https://www.wonka.com",
        "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti",
        
    ]);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/posts', function () {
    return response()->json([
        'posts' => [
            [
                'title' => 'Post One'
            ]

        ]
    ]);
});
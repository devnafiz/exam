<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RatingController;

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\ProfileController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('/books',BookController::class);
    Route::post('books/{book}/ratings', 'RatingController@store');


Route::post('/login',[LoginController::class,'login']);
Route::post('/register',[RegisterController::class,'register']);


Route::middleware('auth:api')->group(function(){
    Route::get('/profile',[ProfileController::class,'show']);
    
	Route::get('/products',[ProductController::class,'index']);    
});  


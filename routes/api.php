<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\BookIssuedController;
use App\Http\Controllers\Api\BookReturnedController;
use App\Http\Controllers\Api\BooksCategoryController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);




Route::group(['middleware' => 'auth.jwt'], function () {

    Route::group(['prefix'=>'auth'], function () {
        Route::post('/refresh',     [AuthController::class, 'refresh']);
        Route::get('/user-profile', [AuthController::class, 'userProfile']);
        Route::get('/update-profile', [AuthController::class, 'update_profile']);
        Route::post('logout',       [AuthController::class, 'logout']);
    });
        Route::resource('/book',           BookController::class);
        Route::resource('/books-issued',    BookIssuedController::class);
        Route::resource('/books-returned',  BookReturnedController::class);
        Route::resource('/books-category',  BooksCategoryController::class);
        Route::resource('/Author',          AuthorController::class);
});




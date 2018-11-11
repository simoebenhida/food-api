<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', 'LoginController@store')->name('login');
Route::post('/logout', 'LoginController@destroy')->name('logout');
Route::post('/register', 'RegisterController@store')->name('register');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/foods', 'FoodController@index')->name('food.index');
    Route::post('/foods', 'FoodController@store')->name('food.store');
});
// Route::middleware('auth:api')->get('/foods', 'FoodController@index');


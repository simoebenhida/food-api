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

Route::group(['namespace' => 'API'], function() {
    Route::post('login', 'LoginController@store');
    Route::post('logout', 'LoginController@destroy');
    Route::post('register', 'RegisterController@store');
});
Route::middleware('auth:api')->get('food', 'FoodController@index');


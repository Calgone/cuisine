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

// Route::middleware('auth:api')->get(
//     '/user',
//     function (Request $request) {
//         return $request->user();
//     }
// );
// public routes
Route::post('/login', 'Api\AuthController@login')->name('login.api');
Route::post('/register', 'Api\AuthController@register')->name('register.api');

// private routes
Route::group(
    ['namespace' => 'Api', 'middleware' => 'auth:api'],
    function () {
        Route::get('logout', 'AuthController@logout')->name('logout');
        Route::get('get-user', 'AuthController@getUser');
        Route::get('users', 'UsersController@index');
        Route::get('users/{user}', 'UsersController@show');
        Route::put('users/{user}', 'UsersController@update');
        Route::delete('users/{user}', 'UsersController@destroy');
    }
);

Route::get(
    '/skills',
    function () {
        return ['laravel', 'Vue', 'PHP', 'JavaScript', 'Tooling'];
    }
);

// Route::get('/users', function () {
//     if (rand(1, 10) < 5) {
//         abort(500, 'We could not retrieve the users');
//     }
//     return factory('App\User', 10)->make();
// });

Route::namespace('Api')->group(
    function () {
        Route::apiResource('recipes', 'RecipesController');
    }
);

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Posts routes
 */
Route::prefix('posts')
    ->name('posts.')
    ->group(
    function () {
        /**
         * Post Routes
         */
        Route::get('/', 'PostController@index')->name('get');
        Route::post('/','PostController@store')->name('create');
        Route::get('/{id}', 'PostController@show')->name('getId');
        Route::put('/{id}', 'PostController@update')->name('update');
        Route::delete('/{id}', 'PostController@destroy')->name('delete');
    });

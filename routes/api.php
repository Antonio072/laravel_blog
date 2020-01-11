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

Route::group(
    ['prefix' => 'auth',], 
    function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Posts routes
 */
Route::prefix('posts')
    ->middleware(['jwt.auth'])
    ->name('api.posts.')
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

Route::prefix('comments')
    ->name('api.comments.')
    ->group(
    function () {
        /**
         * Post Routes
         */
        Route::get('/', 'CommentController@index')->name('get');
        Route::post('/','CommentController@store')->name('create');
        Route::get('/{id}', 'CommentController@show')->name('getId');
        Route::put('/{id}', 'CommentController@update')->name('update');
        Route::delete('/{id}', 'CommentController@destroy')->name('delete');
    });

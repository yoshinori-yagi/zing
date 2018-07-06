<?php

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

Route::get('/', 'WelcomeController@index');

// User registration
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// Login authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::get('seats', 'SeatsController@index')->name('seat');
Route::get('seats/update', 'SeatsController@update')->name('seat.update');

Route::group(['middleware' => ['auth']], function () {
     Route::group(['prefix' => 'seats/{id}'], function () {
        Route::get('offence', 'SeatsController@show')->name('offence');
     });
});

Route::get('games', 'GamesController@index')->name('game.index');
Route::get('games/game', 'GamesController@show')->name('game.show');
Route::get('games/game/result', 'GamesController@result')->name('game.result');


Route::get('users/{id}','UsersController@show' )->name('users.show');

Route::post('add_info', 'UsersController@add')->name('add.info');

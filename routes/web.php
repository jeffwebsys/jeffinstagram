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
use App\Mail\NewUserWelcomeMail;


Route::get('/email', function () {
    return new NewUserWelcomeMail();
});

// Route::post('follow/{user}','FollowsController@store');

Auth::routes();

Route::post('/follow/{user}','FollowsController@store');

Route::get('/p/create','PostsController@create');
Route::post('/p/','PostsController@store');
Route::get('/p/{post}','PostsController@show');
Route::get('/','PostsController@index');


Route::get('/profile/{user}', 'ProfilesController@index');
Route::get('/profile/{user}/edit', 'ProfilesController@edit');
Route::patch('/profile/{user}', 'ProfilesController@update');




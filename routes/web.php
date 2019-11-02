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

Route::get('/', 'IndexController@index');

//Route::get('/api', 'ApiController@index');
Route::post('/api/collection', 'Api\CollectionController@store');
Route::get('/api/list/user', 'Api\CollectionController@user_lists');

Route::get('/api/movie', 'Api\MovieController@show');

// review

Route::post('/api/review', 'ReviewController@store');

// favorite movie
Route::post('/api/movies/favorite/toggle', 'Api\FavoriteMovieController@toggle' );
Route::get('/api/movies/favorite', 'Api\FavoriteMovieController@status');

// people
Route::resource('/person', 'PersonController'); // seven methods and seven routes pointing to them by this.

//new movie controller
Route::get('/movies', 'NewMovieController@index')->name('movie_index')->middleware('can:admin');
Route::get('/movies/{id}', 'NewMovieController@show');

// route Review controller
Route::get('/movies/{movie}/reviews', 'ReviewController@index');

Route::get('/movies/{movie}/reviews/create', 'ReviewController@create')->middleware('auth');  // only registered user can do 
Route::post('/movies/{movie}/reviews', 'ReviewController@store')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('new-person', 'NewPersonController');

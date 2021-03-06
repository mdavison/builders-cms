<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');

Route::get('home', 'PagesController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/', 'PagesController@index');
Route::get('about', function(){
    return view('about');
});
Route::get('contact', function(){
    return view('contact');
});
Route::post('contact', 'PagesController@postContactForm');
Route::get('gallery', 'PagesController@gallery');

Route::get('admin', 'AdminController@index');

Route::resource('users', 'UsersController');
Route::get('/users/{id}/restore', 'UsersController@restore');

Route::get('photos/carousel', 'PhotosController@carousel');
Route::post('photos/carousel', 'PhotosController@postCarousel');
Route::resource('photos', 'PhotosController');

Route::resource('galleries', 'GalleriesController');
Route::get('galleries/{id}/sort', 'GalleriesController@sort');
Route::post('galleries/{id}/sort', 'GalleriesController@postSort');
Route::post('galleries/{id}/update-ajax', 'GalleriesController@updateAjax');
<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Front End Routes
Route::get('/', 'FrontEndController@home')->name('website');
Route::get('/position/{name}', 'FrontEndController@positionByName')->name('website.position');



// Admin Panel Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard','UserController@index')->name('dashboard');

    Route::resource('user', 'UserController');
    Route::resource('position', 'PositionController');
    Route::resource('offer', 'OfferController');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/profile', 'UserController@profile_update')->name('user.profile.update');
    
});

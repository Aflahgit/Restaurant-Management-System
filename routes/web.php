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

//Route::get('/', function () {
//    return view('frontend.index');
//});

Route::get('/', 'FrontController@index')->name('welcome');
Route::post('/reservation', 'ReservationController@reserv')->name('reservation.reserv');
Route::post('/contact', 'ContactController@sendMessage')->name('contact.send');

Auth::routes();

//
Route::group(['prefix' => 'backend', 'middleware'=>'auth', 'namespace'=>'backend'], function (){
    Route::get('dashboard', 'DashboardController@index')->name('backend.dashboard');
    Route::resource('slider', 'SliderController');
    Route::resource('category', 'CategoryController');
    Route::resource('item', 'ItemController');
    Route::get('/reservation', 'ReservationController@index')->name('reservation.index');
    Route::post('/reservation/{id}','ReservationController@status')->name('reservation.status');
    Route::delete('/reservation/{id}','ReservationController@destroy')->name('reservation.destroy');
    Route::get('contact','ContactController@index')->name('contact.index');
    Route::get('contact/{id}','ContactController@show')->name('contact.show');
    Route::delete('/contact/{id}','ContactController@destroy')->name('contact.destroy');
});


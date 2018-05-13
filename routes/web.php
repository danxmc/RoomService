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

Route::get('/', function () {
    return redirect('/meals');
});

Route::resource('orders', 'OrderController');
Route::resource('meals', 'MealController');
Route::resource('rooms', 'RoomController');
Route::resource('users', 'UserController');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/orders-pending', 'OrderController@pending');
Route::get('/orders-delivered', 'OrderController@delivered');
Route::get('/my-orders', 'OrderController@userOrders');
Route::get('/rooms-occupied', 'RoomController@occupied');
Route::get('/rooms-vacant', 'RoomController@vacant');
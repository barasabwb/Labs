<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/car','CarController@allcars');
Route::get('/car/{id}','CarController@particularCar');
Route::post('/car/new','CarController@store');
Route::get('/newcar','CarController@newCars');
Route::resource('cars','CarController');
Route::post('/blogs/{car}/reviews', 'ReviewsController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

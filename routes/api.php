<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::post('/get_seats', 'BookingsController@index');



Route::middleware('auth:api')->group(function () {

    Route::post('/book_seat', 'BookingsController@store');

});


Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');


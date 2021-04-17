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


Auth::routes();

Route::group(['prefix' => 'admin', 'namespace' => 'Admin' ], function () {

    Route::group(['prefix' => 'login', 'middleware' => 'guest'], function () {

        Route::get('/', 'AuthController@index')->name('admin.login');

        Route::post('/', 'AuthController@store')->name('admin.login.store');

    });

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/', 'HomeController@index')->name('admin');

        Route::group(['prefix' => 'stations'], function () {

            Route::get('/', 'StationsController@index')->name('station.index');

            Route::post('/show', 'StationsController@show')->name('station.show');

            Route::post('/store', 'StationsController@store')->name('station.store');

            Route::get('/delete/{id}', 'StationsController@delete')->name('station.delete');

        });

        Route::group(['prefix' => 'routes'], function () {

            Route::get('/', 'RoutesController@index')->name('route.index');

            Route::post('/store', 'RoutesController@store')->name('route.store');

            Route::get('/delete/{id}', 'RoutesController@delete')->name('route.delete');

        });

        Route::group(['prefix' => 'trips'], function () {

            Route::get('/', 'TripsController@index')->name('trip.index');

            Route::post('/store', 'TripsController@store')->name('trip.store');

            Route::get('/delete/{id}', 'TripsController@delete')->name('trip.delete');

        });

        Route::group(['prefix' => 'bookings'], function () {

            Route::get('/', 'BookingsController@index')->name('booking.index');

            Route::get('/delete/{id}', 'BookingsController@delete')->name('booking.delete');

        });

    });

});

Route::group(['prefix' => '/api', 'namespace' => 'API'], function () {

    Route::post('/get_seats', 'BookingsController@index')->name('api.get.seats');

    Route::post('/book_trip', 'BookingsController@store')->name('booking.store');

});

Route::group(['prefix' => '/', 'namespace' => 'Web'], function () {

    Route::group(['prefix' => '/'], function () {

        Route::get('/', 'HomeController@index')->name('home');

        Route::post('/get_trips', 'HomeController@searchTrips')->name('trip.search');

    });

    Route::group(['prefix' => 'book'], function () {

        Route::get('/show/{id}', 'BookingsController@index')->name('trip.show');

        Route::post('/book_trip', 'BookingsController@store')->name('booking.store');

    });

    Route::group(['prefix' => 'seats'], function () {

        Route::post('/show', 'SeatsController@show')->name('seats.show');

    });

});




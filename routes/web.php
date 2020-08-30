<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::get('/reset', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    return redirect('/');
});

Route::redirect('/', 'drivers')->name('index');

Route::group(['middleware' => ['auth', 'verified']], function () {
    // User
    Route::group(['prefix' => 'user', 'namespace' => 'User', 'as' => 'user.'], function () {
        Route::get('/rates', 'PagesController@billing')->name('rates');
    });

    // Driver
    Route::group(['prefix' => 'drivers', 'namespace' => 'Drivers', 'as' => 'drivers.'], function () {
        // Route::get('/', 'PagesController@index')->name('dashboard');
        Route::get('/', function () {
            return view('setup.awaiting-setup');
        })->name('dashboard');
    });

    // Dispatches
    Route::group(['prefix' => 'dispatch', 'namepsace' => '', 'as' => 'dispatch.'], function () {
        Route::get('/', 'DispatchController@index')->name('index');
        Route::get('/start', 'DispatchController@create')->name('start');

        // Actions
        Route::post('/', 'DispatchController@store')->name('store');
        Route::post('/warehouse/search', 'WarehouseController@search')->name('warehouse.search');

        // URI
        Route::put('/update/{reference_number}', 'DispatchController@update')->name('update');
        Route::get('/{reference_number}', 'DispatchController@show')->name('show');
    });

    // Admin
    Route::group([], function () {
        //
    });

});

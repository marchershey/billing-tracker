<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Auth Routes
Auth::routes(['verify' => true]);

Route::redirect('/', 'driver')->name('index'); // do something with this

// Middleware: Auth & Verified
Route::group(['middleware' => ['auth', 'verified']], function () {

    // Profile Setup
    Route::group(['prefix' => 'setup', 'as' => 'setup.', 'namespace' => 'Setup'], function () {
        Route::get('/', 'SetupController@index')->name('index');
        Route::get('/processing', 'SetupController@processing')->name('processing');
        Route::post('/', 'SetupController@update')->name('update');
    });

    // Middleware: Setup Completed
    Route::group(['middleware' => 'setup'], function () {

        // Driver
        Route::group(['prefix' => 'driver', 'as' => 'drivers.', 'namespace' => 'Drivers'], function () {

            Route::redirect('/', '/driver/dashboard');

            // Dashboard
            Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'namespace' => 'Dashboard'], function () {
                Route::get('/', 'DashboardController@index')->name('index');
            });

            // Profile
            Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Profile'], function () {
                Route::get('/', 'ProfileController@index')->name('index');
                Route::post('/', 'ProfileController@index_post')->name('index.post');
                Route::get('/password', 'ProfileController@password')->name('password');
                Route::post('/password', 'ProfileController@password_post')->name('password.post');
                Route::get('/settings', 'ProfileController@settings')->name('settings');
                Route::post('/settings', 'ProfileController@settings_post')->name('settings.post');
            });

            // Rates
            Route::group(['prefix' => 'rates', 'as' => 'rates.', 'namespace' => 'Rates'], function () {
                Route::get('/', 'RatesController@index')->name('index');
            });

            // Dispatches
            Route::group(['prefix' => 'dispatch', 'namespace' => 'Dispatch', 'as' => 'dispatch.'], function () {
                Route::get('/', 'DispatchController@index')->name('index');
                Route::get('/start', 'DispatchController@start')->name('start');
                Route::post('/start', 'DispatchController@start_post')->name('start.post');

                Route::put('/{reference_number}', 'DispatchController@show_post')->name('show.post');
                Route::get('/{reference_number}', 'DispatchController@show')->name('show');

                Route::post('/warehouse', 'DispatchController@warehouse_search')->name('warehouse.search');
                Route::post('/rate', 'DispatchController@calc_rate')->name('calc.rate');
            });
        });
    });

    // Admin
    Route::group([], function () {
        //
    });

});

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

// Test
Route::get('/test', function () {
    //
});

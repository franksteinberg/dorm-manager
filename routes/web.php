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
    return view('welcome');
});

Route::bind('resident_with_housing', function($id) {
    return \App\Resident::with('bed.room.unit.building')->findOrFail($id);
});


Route::prefix('residents')->group(function () {
    Route::get('/', 'ResidentController@index');
    Route::get('/create', 'ResidentController@create');
    Route::get('/{resident_with_housing}', 'ResidentController@edit');
});


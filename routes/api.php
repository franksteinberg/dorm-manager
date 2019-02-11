<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::bind('bed_with_unit', function($id) {
    return \App\Bed::with('room.unit')->findOrFail($id);
});

Route::post('/residents', 'ResidentController@store');
Route::delete('/residents/{resident}', 'ResidentController@destroy');
Route::patch('/residents/{resident}', 'ResidentController@update');
Route::get('/residents/{resident}', 'ResidentController@show');
Route::get('/residents', 'ResidentController@index');


Route::patch('/beds/{bed_with_unit}', 'BedController@update');

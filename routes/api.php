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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('client',App\Http\Controllers\ClientController::class)->only(['index','store','show','update','destroy']);
Route::post('contact/add/{id}', 'App\Http\Controllers\ContactController@add')->name('add');
Route::get('{id}/contact-list', 'App\Http\Controllers\ContactController@index')->name('conatctList');
Route::get('{id}/contact-show', 'App\Http\Controllers\ContactController@show')->name('conatctShow');
Route::patch('contact-update/{id}', 'App\Http\Controllers\ContactController@updateContact')->name('contactUpdate');
Route::delete('{id}/contact-delte', 'App\Http\Controllers\ContactController@destroy')->name('contactDestroy');
Route::get('/search', [App\Http\Controllers\clientController::class, 'getClients']);
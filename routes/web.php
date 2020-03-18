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

// Route::resource('staffs', 'StaffsController');
Route::group(['prefix' => 'staffs'], function () {
  Route::get('/', 'StaffsController@index')->name('staffs.index');
  Route::get('/create', 'StaffsController@create')->name('staffs.create');
  Route::post('/store', 'StaffsController@store')->name('staffs.store');
  Route::get('/{id}', 'StaffsController@show')->name('staffs.show');
  Route::get('/{id}/edit', 'StaffsController@edit')->name('staffs.edit');
  Route::post('/update', 'StaffsController@update')->name('staffs.update');
  Route::get('/{id}/delete', 'StaffsController@destroy')->name('staffs.destroy');
});

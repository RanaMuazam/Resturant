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

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/login');
});
    Route::group(['middleware'=>"web"],function(){
        Route::get('/', 'App\Http\Controllers\RestoController@index');
    Route::get('/list', 'App\Http\Controllers\RestoController@list');
    Route::view('/add','add');
    Route::post('/add','App\Http\Controllers\RestoController@add');
    Route::get('/delete/{id}','App\Http\Controllers\RestoController@delete');
    Route::get('/edit/{id}','App\Http\Controllers\RestoController@edit');
    Route::post('edit/{id}','App\Http\Controllers\RestoController@update');
    Route::view('register','register');
    Route::post('register','App\Http\Controllers\RestoController@register');
    Route::view('login','login');
    Route::post('login','App\Http\Controllers\RestoController@login');
    Route::get('makesearch','App\Http\Controllers\RestoController@search');
    Route::view('/search','search');


    });
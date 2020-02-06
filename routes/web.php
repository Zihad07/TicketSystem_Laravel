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

Route::get('/contact','TicketsController@create')->name('ticket.create');
Route::post('/contact','TicketsController@store')->name('ticket.store');

Route::get('/about','PagesController@about')->name('about');

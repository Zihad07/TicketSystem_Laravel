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
Route::get('/tickets','TicketsController@index')->name('ticket.all');
Route::get('/contact','TicketsController@create')->name('ticket.create');
Route::post('/contact','TicketsController@store')->name('ticket.store');
Route::get('/ticket/{slug}','TicketsController@show')->name('ticket.show');
Route::get('/ticket/{slug}/edit','TicketsController@edit')->name('ticket.edit');
Route::post('/ticket/{slug}/edit','TicketsController@update')->name('ticket.update');
Route::post('/ticket/{slug}/delete','TicketsController@destroy')->name('ticket.delete');

Route::post('/comment','CommentsController@newComment')->name('ticket.newcomment');



Route::get('/about','PagesController@about')->name('about');

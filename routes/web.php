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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/'); // name the route for multi logins in advance

Route::get('book', 'BooksController@index'); // display book list
//register
Route::post('/booksadd','BooksController@register');
//add
Route::get('/booksadd','BooksController@add');
//delete
Route::delete('/book/{book}','BooksController@destroy');
//edit
Route::get('/booksedit/{book}', 'BooksController@edit');
//update
Route::post('/bookupdate', 'BooksController@update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

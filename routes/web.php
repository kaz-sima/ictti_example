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

Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function(){
    Route::middleware('guest:admin')->group(function(){
            
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
            
        Route::get('password/rest', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    });
    Route::middleware('auth:admin')->group(function(){
                
        Route::get('logout', 'Auth\LoginController@logout')->name('logout');
        Route::get('/home', 'HomeController@index')->name('top');
                
        // book manage
        Route::get('/book', 'BooksController@index')->name('book');
        Route::post('/booksadd','BooksController@register');
        Route::get('/booksadd','BooksController@add');
        Route::get('/book/{book}','BooksController@destroy');
        Route::get('/booksedit/{book}', 'BooksController@edit');
        Route::post('/bookupdate', 'BooksController@update');
        
        //ctgry management
        Route::get('ctgry', 'ctgryController@index')->name('ctgry.index'); 	// add
        Route::get('ctgry/add', 'ctgryController@add')->name('ctgry.add'); 	// add
        Route::post('ctgry/add', 'ctgryController@createctgry'); 			// add
        Route::post('subctgry/add', 'ctgryController@createsubctgry'); 		// add
        
        // loan & reservation management
        Route::get('loan', 'LoanmanageController@index')->name('loan.index'); //add
        Route::post('loans/{loan_id}', 'LoanmanageController@changestat');	// add
        Route::post('reserve/{reserve_id}', 'LoanmanageController@reservecancel'); //add
        
     });
});
        
// enabling the mail verification
Auth::routes(['verify' => true]);

Route::get('auth/{provider}', 'Auth\AuthController@redirect');
Route::get('auth/{provider}/callback', 'Auth\AuthController@callback');

Route::get('/home', 'HomeController@index')->name('user.top');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('profile/edit','ProfileController@edit')->name('profile.edit');
Route::get('profile/update','ProfileController@confirm')->name('profile.update');
Route::post('profile/edit','ProfileController@validation');
Route::post('profile/update','ProfileController@update');

// borrowing book
Route::get('book', 'BookborrowingController@index')->name('book.index');
Route::post('book/detail/{books}', 'BookborrowingController@detail');
Route::post('book/borrow/{books}', 'BookborrowingController@borrow');
Route::post('book/reservation/{books}', 'BookborrowingController@reservation');


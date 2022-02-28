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
Auth::routes();

// Route::get('/login', 'LoginController@index') -> name('home');
// Route::get('/logout', 'LoginController@Logout') -> name('logout');

Route::get('/', function() {
    return view('welcome');
});
Route::get('/home', 'HomeController@index') -> name('dashboard');
Route::group(['middleware' => 'auth'], function() {
    
    Route::get('/new-transaction', 'TransactionController@create') -> name('transactions');
    Route::post('/new-transaction/store', 'TransactionController@store') -> name('transactions.store');
    
    // Route::post('/create-user', 'UsersController@createUser') -> name('signup');
    // Route::get('/sign-user', 'UsersController@signInUser') -> name('signin');
    // Route::get('/logout', 'UsersController@userLogout') -> name('getout');
    
    Route::post('/currency/store', 'CurrencyController@store') -> name('currency.store');
    Route::get('currency', 'CurrencyController@create') -> name('currency');
    Route::get('currency/total', 'CurrencyController@index') -> name('currency.balance');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

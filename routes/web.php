<?php

use App\Http\Controllers\Admin\PostController;

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

Route::get('/', 'Guests\HomeController@index')->name('guests.home');
Route::get('/contact', 'Guests\HomeController@createContactForm')->name('guests.contanct');
Route::post('/contact', 'Guests\HomeController@contanctFormThanker')->name('guests.contact.send');
Route::post('/thx', 'Guests\HomeController@contanctFormThanker')->name('guests.thx');

Auth::routes();

Route::middleware('auth')
->namespace('Admin')
->prefix('admin')
->name('admin.')
->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostController');
    Route::resource('users', 'UserController');
});


Route::get("{any?}", function(){
    return view('guests.home');
})->where('any', '.*');

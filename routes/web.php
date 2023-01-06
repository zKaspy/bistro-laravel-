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

Route::get('/', 'App\Http\Controllers\IndexController@index')->name('home');
Route::get('/about', 'App\Http\Controllers\IndexController@about')->name('about');
Route::get('/contacts', 'App\Http\Controllers\IndexController@contacts')->name('contacts');
Route::get('/cabinet', 'App\Http\Controllers\IndexController@cabinet')->name('cabinet')->middleware('auth');
Route::get('/cabinet/logout', 'App\Http\Controllers\IndexController@cabinetLogout')->name('logout')->middleware('auth');
Route::post('/cabinet/save', 'App\Http\Controllers\IndexController@cabinetPost')->name('cabinetPost')->middleware('auth');
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('indexCart')->middleware('auth');
Route::post('/cart/minus', 'App\Http\Controllers\CartController@subtractItem')->name('minusCartItem')->middleware('auth');
Route::post('/cart/delete', 'App\Http\Controllers\CartController@deleteItem')->name('deleteCartItem')->middleware('auth');
Route::post('/cart/plus', 'App\Http\Controllers\CartController@addItem')->name('plusCartItem')->middleware('auth');
Route::post('/cart/order', 'App\Http\Controllers\CartController@cartOrder')->name('cartOrder')->middleware('auth');
Route::post('/addtocart', 'App\Http\Controllers\CartController@addToCart')->name('addtocart')->middleware('auth');
Route::post('/auth/register', 'App\Http\Controllers\Auth\AuthController@register')->name('register');
Route::post('/auth/login', 'App\Http\Controllers\Auth\AuthController@login')->name('login');
Route::get('/admin', 'App\Http\Controllers\AdminController@admin')->middleware('role:admin,editor');
Route::get('/admin/pages', 'App\Http\Controllers\AdminController@pages')->middleware('role:admin,editor');
Route::get('/admin/clients', 'App\Http\Controllers\AdminController@clients')->middleware('role:admin');
Route::get('/admin/clients/profile/{id}', 'App\Http\Controllers\AdminController@editProfile')->name('editprofile')->middleware('role:admin');
Route::post('/admin/clients/profile/{id}', 'App\Http\Controllers\AdminController@editProfileSave')->name('postprofile')->middleware('role:admin');
  
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

/*
Route::get('/', function () {
    return view('welcome');
});
*/



Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("products.index");

Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("products.show");

Route::middleware('admin')->group(function () {

    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");

    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.products.index");

    Route::post('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@store')->name("admin.products.store");

    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.products.delete");

    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.products.edit");

    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.products.update");

});

Route::get('/configuracion', 'App\Http\Controllers\HomeController@configuracion')->name("home.configuracion");

Route::post('/configuracion/store', 'App\Http\Controllers\HomeController@sesion')->name("home.sesion");

Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

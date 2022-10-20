<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController; //add ProductController

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomeController::class, 'checkUserType']);

Route::get('/product', 'ProductController@index')->name('product');
Route::get('/create', 'ProductController@create')->name('create');
Route::post('store/', 'ProductController@store')->name('store');
Route::get('show/{product}', 'ProductController@show')->name('show');
Route::get('edit/{product}', 'ProductController@edit')->name('edit');
Route::put('edit/{product}','ProductController@update')->name('update');
Route::delete('/{product}','ProductController@destroy')->name('destroy');

Route::get('/admin/dashboard', function(){
    return view('admin-dashboard');
})->name('admin.dashboard');

Route::get('/user/dashboard', function(){
    return view('user-dashboard');
})->name('user.dashboard');

Route::get('/post', function(){
    return "post page";
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

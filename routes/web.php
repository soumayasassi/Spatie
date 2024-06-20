<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth ;
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
Route::get('/restricted', function () {
    return "Vous avez accès à cette page.";
})->middleware('verif.age');
Route::get('contact' ,[\App\Http\Controllers\HomeController::class , 'index'])->name('mycontact');;
/*Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
Route::resource('/products', \App\Http\Controllers\ProductController::class);
    //Route::patch('/products', [\App\Http\Controllers\ProductController::class, 'update'])->name('profile.update');
   // Route::delete('/products', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('profile.destroy');
});*/

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('products', App\Http\Controllers\ProductController::class);
});



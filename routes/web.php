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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/producto', function () {
    return view('pages.public.producto');
})->name('producto');

Route::get('/contacto', function () {
    return view('pages.public.contacto');
})->name('contacto');

Route::get('/welcome', function () {
    return view('pages.private.timeregister');
})->name('welcome');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

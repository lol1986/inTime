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
    return view('public.producto');
})->name('producto');

Route::get('/contacto', function () {
    return view('public.contacto');
})->name('contacto');

Route::get('/welcome', function () {
    return view('private.timeregister');
})->name('welcome');

Route::get('/unauthorized', function () {
    return view('private.unauthorized');
})->name('unauthorized')->middleware('auth');;

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('companies', 'CompanyController');
Route::resource('calendars', 'CalendarController');

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

//Resources
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/users/filter', 'UserController@filter')->name('users.filter');
Route::resource('users', 'UserController');
Route::post('/roles/filter', 'RoleController@filter')->name('roles.filter');
Route::resource('roles', 'RoleController');
Route::post('/companies/filter', 'CompanyController@filter')->name('companies.filter');
Route::resource('companies', 'CompanyController');
Route::post('/calendars/filter', 'CalendarController@filter')->name('calendars.filter');
Route::resource('calendars', 'CalendarController');
Route::post('/holidays/filter', 'HolidayController@filter')->name('holidays.filter');
Route::resource('holidays', 'HolidayController');
Route::post('/leaves/filter', 'LeaveController@filter')->name('leaves.filter');
Route::resource('leaves', 'LeaveController');
Route::post('/timeregistries/filter', 'TimeregistryController@filter')->name('timeregistries.filter');
Route::resource('timeregistries', 'TimeregistryController');
Route::post('/usersholidays/filter', 'UsersholidayController@filter')->name('usersholidays.filter');
Route::resource('usersholidays', 'UsersholidayController');


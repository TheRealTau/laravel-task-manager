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
    return view('welcome');
});

Route::get('/task', 'TaskController@index')->name('task.index');
Route::get('/task/create', 'TaskController@create')->name('task.create');
Route::post('/task', 'TaskController@store')->name('task.store');
Route::get('/task/edit/{id}', 'TaskController@edit')->name('task.edit');
Route::patch('/task/{id}', 'TaskController@update')->name('task.update');
Route::delete('/task/{id}', 'TaskController@destroy')->name('task.destroy');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

Route::get('/user', 'UserController@index')->name('user.index');

Auth::routes(['register' => true]);

// Route::get('/dashboard', 'HomeController@index')->name('dashboard.index');
Route::get('/home', 'HomeController@index')->name('home');
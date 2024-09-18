<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\App;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'ExampleController@index');
Route::get('/login', 'AuthenticationController@index');
Route::post('/login', 'AuthenticationController@login');
Route::get('/register/create', 'AuthenticationController@create');
Route::post('/register', 'AuthenticationController@store');
Route::get('/dashboard', 'DashboardController@index');
Route::get('/dashboard/create', 'DashboardController@create');
Route::post('/dashboard', 'DashboardController@store');
Route::get('/dashboard/{nrp}/edit', 'DashboardController@edit');
Route::put('/dashboard/{nrp}', 'DashboardController@update');
Route::delete('/dashboard/{nrp}', 'DashboardController@destroy');


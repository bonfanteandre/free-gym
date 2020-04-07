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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/muscles', 'MusclesController@index');
Route::get('/muscles/create', 'MusclesController@create');
Route::post('/muscles', 'MusclesController@store');
Route::get('/muscles/{muscle}', 'MusclesController@edit');
Route::patch('/muscles/{muscle}', 'MusclesController@update');

Route::get('/exercises', 'ExercisesController@index');
Route::get('/exercises/create', 'ExercisesController@create');
Route::post('/exercises', 'ExercisesController@store');
Route::get('/exercises/{exercise}', 'ExercisesController@edit');
Route::patch('/exercises/{exercise}', 'ExercisesController@update');

Route::post('/exercise/{exercise}/muscle', 'ExercisesMusclesController@store');
Route::delete('/exercise/{exercise}/muscle/{muscle}', 'ExercisesMusclesController@destroy');

Route::get('/clients', 'ClientsController@index');
Route::get('/clients/create', 'ClientsController@create');
Route::post('/clients', 'ClientsController@store');
Route::get('/clients/{client}', 'ClientsController@edit');
Route::patch('/clients/{client}', 'ClientsController@update');

Route::get('/plans', 'PlansController@index');
Route::get('/plans/create', 'PlansController@create');
Route::post('/plans', 'PlansController@store');
Route::get('/plans/{plan}', 'PlansController@edit');
Route::patch('/plans/{plan}', 'PlansController@update');

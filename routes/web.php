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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::resource('projects', 'ProjectController');;
Route::get('ajax/complete_project', 'ProjectController@complete_project'); 
Route::get('ajax/project_note', 'ProjectController@project_note'); 
Route::get('submit_project/{id}', 'ProjectController@submit_project')->name('submit_project'); 
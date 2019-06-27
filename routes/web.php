<?php

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

Route::group(['middleware' => 'auth'], function () {

    // CREATE PROJECT PAGE
    Route::get('/projects/create', 'ProjectsController@create');

    Route::get('/home', 'HomeController@index')->name('home');

    // INDEX PAGE
    Route::get('/projects', 'ProjectsController@index');

    // SHOW
    Route::get('/projects/{project}', 'ProjectsController@show');

    // EDIT PROJECT PAGE
    Route::get('/projects/{project}/edit', 'ProjectsController@edit');

    // CREATE PROJECT
    Route::post('/projects', 'ProjectsController@store');

    // UPDATE PROJECT
    Route::patch('/projects/{project}', 'ProjectsController@update');

    // DELETE THE PROJECT
    Route::delete('/projects/{project}', 'ProjectsController@destroy');

    // CREATE TASK
    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

    // UPDATE TASK
    Route::patch('/projects/{project}/tasks/{task}', 'ProjectTasksController@update');


});

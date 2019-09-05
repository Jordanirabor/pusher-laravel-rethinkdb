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

Route::get('/', "TodoController@getTodo")->name('home');
Route::post('/todo', "TodoController@createTodo")->name("create-todo");
Route::put('/todo/{id}', "TodoController@updateTodo")->name("update-todo");
Route::delete('/todo/{id}', "TodoController@deleteTodo")->name('delete-todo');

<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('editer', 'App\Http\Controllers\Post@index');
Route::get('archived', 'App\Http\Controllers\Post@archived');
Route::get('post', 'App\Http\Controllers\Post@post');
Route::get('articles/{id}', 'App\Http\Controllers\Post@articles');

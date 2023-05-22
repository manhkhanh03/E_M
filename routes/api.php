<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('post', 'App\Http\Controllers\Api\PostController@post');

Route::post('header', 'App\Http\Controllers\Api\PostController@header');

Route::post('subheadline', 'App\Http\Controllers\Api\PostController@subheadline');

Route::post('images', 'App\Http\Controllers\Api\PostController@image');

Route::post('contents', 'App\Http\Controllers\Api\PostController@content');

Route::post('articles', 'App\Http\Controllers\Api\PostController@article');
Route::get('articles', 'App\Http\Controllers\Api\PostController@showArticle');



// 
Route::get('post/hot', 'App\Http\Controllers\Api\PostController@showPostHot');
Route::get('post/hot_0', 'App\Http\Controllers\Api\PostController@showPostHot_0');
// Route::get('', 'App\Http\Controllers\Api\PostController@showPostHot_0');
Route::get('article/{id}', 'App\Http\Controllers\Api\PostController@showArticleById');

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

// 直接 view を返す書き方
Route::get('/', function () {
    return view('welcome');
});

Route::resource('recipe', 'RecipeController');

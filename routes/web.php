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
    return view('main');
})->name('main');

Route::get('about', function () {
    return view('about');
})->name('about');

Route::group([
    'prefix' => 'news'
], function () {
    Route::get('', 'NewsController@index')
    ->name('news');

    Route::get('add', 'NewsController@addView')
    ->middleware('auth')
    ->name('news-view');

    Route::post('add', 'NewsController@add')
    ->middleware('auth')
    ->name('news-add');

    Route::get('categories', 'NewsController@categories')
    ->name('categories');

    Route::get('{category}', 'NewsController@category')
    ->name('news-page');

    Route::get('{category}/{id}', 'NewsController@page')
    ->name('news-page');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

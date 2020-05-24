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

// Главная страница
Route::get('/', function () {
    return view('main');
})->name('main');

// О проекте
Route::get('about', function () {
    return view('about');
})->name('about');

// Заказ выгрузки данных
Route::get('download-order', 'DownloadOrderController@index')
->name('download-order');
Route::post('download-order', 'DownloadOrderController@add')
->name('download-order');

// Обратная связь
Route::get('feedback', 'FeedbackController@index')
->name('feedback');
Route::post('feedback', 'FeedbackController@add')
->name('feedback');

// Новости
Route::group([
    'prefix' => 'news'
], function () {
    Route::get('', 'NewsController@index')
    ->name('news');

    // Страница добавления новости из личного кабинета
    Route::get('add', 'NewsController@addView')
    ->middleware('auth')
    ->name('news-view');

    // Добавление новости из личного кабинета
    Route::post('add', 'NewsController@add')
    ->middleware('auth')
    ->name('news-add');

    // Страница категории новостей
    Route::get('categories', 'NewsController@categories')
    ->name('categories');

    // Список категорий новостей
    Route::get('{category}', 'NewsController@category')
    ->name('news-page');

    // Выбранная категория Новостей
    Route::get('{category}/{id}', 'NewsController@page')
    ->name('news-page');
});

// Маршруты авторизации
Auth::routes();

// Личный кабинет
Route::get('/home', 'HomeController@index')->name('home');

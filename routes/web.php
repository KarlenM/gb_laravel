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

// - Личный кабинет -
Route::prefix('admin')->name('admin.')->group(
    function() {

        // Маршруты авторизации
        Auth::routes();

        // Главняа страница
        Route::get('', 'Admin\HomeController@index')->name('main');

        // Новости
        Route::group([
            'middleware' => ['auth']
        ], function () {
            // Новости
            Route::resource('news', 'Admin\NewsController')
            ->except(['show']);

            // Категории
            Route::resource('categories', 'Admin\CategoriesController')
            ->except(['show']);

            // Ресурсы
            Route::resource('resources', 'Admin\ResourcesController')
            ->except(['show']);

            // Обратная связь
            Route::resource('feedback', 'Admin\FeedbackController'
            )->except(['show', 'create', 'store']);

            // Заказ выгрузки
            Route::resource('download-order', 'Admin\DownloadOrderController')
            ->except(['show', 'create', 'store']);
        });
    }
);
// -------------------

// Главная страница
Route::get('/', 'NewsController@index')
->name('main');

// Обратная связь
Route::resource('feedback', 'FeedbackController')
->only(['index', 'store']);

// Заказ выгрузки
Route::resource('download-order', 'DownloadOrderController')
->only(['index', 'store']);

// О проекте
Route::get('about', 'AboutController@index')
->name('about');

// Новость
Route::get('{category}/{id}', 'NewsController@show')
->name('news.show');

// Новости по категориям
Route::get('{category}', 'CategoriesController@index')
->name('news.category');

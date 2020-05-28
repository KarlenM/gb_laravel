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
        Auth::routes();

        Route::get('', 'Admin\HomeController@index')->name('main');

        // Новости
        Route::group([
            'middleware' => ['auth']
        ], function () {
            Route::resource('news', 'Admin\NewsController');
            Route::resource('categories', 'Admin\CategoriesController');
            Route::resource('resources', 'Admin\ResourcesController');
            Route::resource('feedback', 'Admin\FeedbackController');
            Route::resource('download-order', 'Admin\DownloadOrderController');
        });
    }
);
// -------------------

// Главная страница
Route::get('/', 'NewsController@index')
->name('main');

// Заказ выгрузки данных
Route::resource('download-order', 'DownloadOrderController');

// Обратная связь
Route::resource('feedback', 'FeedbackController');

// О проекте
Route::get('about', 'AboutController@index')
->name('about');

// Новость
Route::get('{category}/{id}', 'NewsController@show')
->name('news.show');

// Новости по категориям
Route::get('{category}', 'CategoriesController@index')
->name('news.category');

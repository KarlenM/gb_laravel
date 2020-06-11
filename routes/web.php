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
use \UniSharp\LaravelFilemanager\Lfm;

// - Личный кабинет -
Route::prefix('admin')->name('admin.')->group(
    function() {

        // Маршруты авторизации
        Auth::routes();

        // Авторизация через социальные сети
            // Facebook
            Route::get('login/facebook', 'Auth\SocialNetworks\FacebookAuthController@redirect')
            ->name('login.facebook');

            Route::get('login/facebook/callback', 'Auth\SocialNetworks\FacebookAuthController@handle')
            ->name('login.facebook.callback');

        // Главняа страница
        Route::get('', 'Admin\HomeController@index')->name('main');

        // Новости
        Route::group([
            'middleware' => ['auth', 'admin']
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

            // Профили
            Route::resource('profiles', 'Admin\ProfilesController')
            ->only(['index', 'edit', 'update']);

            // Источники
            Route::resource('sources', 'Admin\SourcesController')
            ->except(['show']);
        });

        // Парсер новостей
        Route::get('parser', 'Admin\ParserController@index');
    }
);
// -------------------

Route::group(
    [
        'prefix' => 'laravel-filemanager', 
        'middleware' => 
            [
                'web', 
                'auth', 
                'admin'
            ]
    ], function () {
        Lfm::routes();
    }
);


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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

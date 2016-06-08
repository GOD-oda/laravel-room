<?php
Route::group(['middleware' => 'web'], function () {
    // 管理系
    // Route::group(['domain' => 'admin.localhost'], function () {
    //     Route::auth();
    //     Route::group(['middleware' => 'auth'], function () {
    //         Route::post('/blog/search', 'Admin\BlogController@search');
    //         Route::resource('blog', 'Admin\BlogController');
    //         Route::post('/payment/search', 'PaymentController@search');
    //         Route::resource('/payment', 'PaymentController');
    //     });
    //     Route::get('/', function () {
    //         return redirect()->action('Auth\AuthController@login');
    //     });
    // });
    // ブログ
    // Route::group(['domain' => 'blog.localhost'], function () {
    //     Route::resource('/article', 'ArticlesController', ['only' => ['index', 'show']]);
    //     Route::get('/', function () {
    //         return redirect()->action('ArticlesController@index');
    //     });
    // });
    // ポートフォリオ
    // Route::get('/', function () {
    //     return 'ポートフォリオ製作中';
    // });

    // 管理系
    Route::group(['domain' => 'admin.t-oda.tech'], function () {
        Route::auth();
        Route::group(['middleware' => 'auth'], function () {
            Route::post('/blog/search', 'Admin\BlogController@search');
            Route::resource('blog', 'Admin\BlogController');
            Route::post('/payment/search', 'PaymentController@search');
            Route::resource('/payment', 'PaymentController');
        });
        Route::get('/', function () {
            return redirect()->action('Auth\AuthController@login');
        });
    });
    // ブログ
    Route::group(['domain' => 'blog.t-oda.tech'], function () {
        Route::resource('/article', 'ArticlesController', ['only' => ['index', 'show']]);
        Route::get('/', function () {
            return redirect()->action('ArticlesController@index');
        });
    });
    // ポートフォリオ
    Route::get('/', function () {
        return 'ポートフォリオ製作中';
    });

});
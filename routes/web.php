<?php

Route::group(['middleware' => 'web'], function () {
    // 管理
    Route::group(['prefix' => 'admin'], function () {
        // 認証
        Route::get('/login', 'Auth\AuthController@showLoginForm');
        Route::post('/login', 'Auth\AuthController@login');
        Route::get('/logout', 'Auth\AuthController@logout')->name('logout');

        Route::group(['middleware' => 'auth'], function () {
            Route::post('blog/search', 'Admin\BlogController@search');
            Route::post('blog/delete-tag', 'Admin\BlogController@deleteTag');
            Route::resource('blog', 'Admin\BlogController');
            Route::post('payment/search', 'PaymentController@search');
            Route::resource('payment', 'PaymentController');
            Route::get('/', function () {
                return redirect('admin/blog');
            });
        });
    });
    Route::get('contact', 'ContactController@index')->name('contact');
    Route::post('contact', 'ContactController@contact');
    //Route::get('beginner', 'ArticlesController@beginner')->name('beginner');
    //Route::get('intermediate', 'ArticlesController@intermediate')->name('intermediate');
    Route::get('/{entry}', 'ArticlesController@show');
    Route::get('/tag/{tag_name}', 'ArticlesController@tag');
    Route::get('/', 'ArticlesController@index')->name('top');
});

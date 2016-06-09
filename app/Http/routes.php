<?php
Route::group(['middleware' => 'web'], function () {
    // ブログ管理
    Route::group(['prefix' => 'admin'], function () {
        Route::auth();
        Route::group(['middleware' => 'auth'], function () {
            Route::post('blog/search', 'Admin\BlogController@search');
            Route::resource('blog', 'Admin\BlogController');
            Route::post('payment/search', 'PaymentController@search');
            Route::resource('payment', 'PaymentController');
            Route::get('/', function () {
                return redirect('admin/blog');
            });
        });
    });
    // ブログ
    Route::get('/', 'ArticlesController@index');
    Route::get('/{entry}', 'ArticlesController@show');
});
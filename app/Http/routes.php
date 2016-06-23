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
    /**
     * ブログ
    */
    // お問い合わせフォーム
    Route::get('contact', 'ContactController@index');
    Route::post('contact', 'ContactController@contact');
    // 記事詳細ページ
    Route::get('/{entry}', 'ArticlesController@show');
    // 記事一覧ページ
    Route::get('/', 'ArticlesController@index');
});
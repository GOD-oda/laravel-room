<?php
Route::group(['middleware' => 'web'], function () {
    // ブログ管琁E    
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
    // お問ぁE��わせフォーム
    Route::get('contact', 'ContactController@index');
    Route::post('contact', 'ContactController@contact');
    // 記事詳細ペ�Eジ
    Route::get('/{entry}', 'ArticlesController@show');
    // 記事一覧ペ�Eジ
    Route::get('/', 'ArticlesController@index');

    Route::get('/youtube', function () {
        return view('youtube');
    });
});
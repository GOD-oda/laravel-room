<?php
Route::group(['middleware' => 'web'], function () {
    // 繝悶Ο繧ｰ邂｡逅・    
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
     * 繝悶Ο繧ｰ
     */
    // 縺雁撫縺・粋繧上○繝輔か繝ｼ繝
    Route::get('contact', 'ContactController@index');
    Route::post('contact', 'ContactController@contact');
    // 險倅ｺ玖ｩｳ邏ｰ繝壹・繧ｸ
    Route::get('/{entry}', 'ArticlesController@show');
    // 險倅ｺ倶ｸ隕ｧ繝壹・繧ｸ
    Route::get('/', 'ArticlesController@index');

    Route::get('/youtube', function () {
        return view('youtube');
    });
});
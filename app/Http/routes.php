<?php
Route::group(['middleware' => 'web'], function () {
    // 管理
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
    Route::get('contact', 'ContactController@index')->name('contact');
    Route::post('contact', 'ContactController@contact');
    Route::get('/{entry}', 'ArticlesController@show');
    Route::get('/', 'ArticlesController@index')->name('top');
    Route::get('/beginner', 'ArticlesController@beginnger')->name('beginner');
    // 中級者向けチュートリアル
    // Route::get('/intermediate', 'ArticlesController@intermediate')->name('intermediate');
});
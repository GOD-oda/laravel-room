<?php

Route::group(['middleware' => 'web'], function () {
    // blog
    // 使う予定なし
    /*Route::group(['domain' => 'blog.t-oda.tech'], function() {
        Route::auth();
        Route::resource('/admin', 'AdminController');
        Route::controller('/', 'ArticlesController');
    });*/

/*    Route::auth();
    Route::resource('/blog', 'BlogController');
    Route::post(
        '/payment/search', ['uses' => 'PaymentController@search', 'as' => 'payment.search']
    );
    Route::resource('/payment', 'PaymentController');*/


    // 管理系
    Route::group(['dmain' => 'admin.t-oda.tech'], function() {
        Route::auth();
        Route::resource('/blog', 'BlogController');
        Route::post(
            '/payment/search', ['uses' => 'PaymentController@search', 'as' => 'payment.search']
        );
        Route::resource('/payment', 'PaymentController');
    });

    // blog
    Route::group(['domain' => 'blog.t-oda.tech'], function() {
        Route::controller('/', 'ArticlesController');
    });

    // tool
    // 使う予定なし
    /*Route::group(['domain' => 'tool.t-oda.tech'], function() {
        Route::get('/', function() {
            return 1;
        });
    });*/

    // portfolio
    Route::get('/', function() {
        abort(503);
        //return view('portfolio.index');
    });

});



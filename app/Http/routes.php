<?php
//dd(env('DB_HOST'));
Route::group(['middleware' => 'web'], function () {
    Route::group(['domain' => 'admin.localhost'], function() {
        Route::auth();
        Route::post('/blog/search', 'BlogController@search');
        Route::resource('/blog', 'BlogController');
        Route::post('/payment/search', 'PaymentController@search');
        Route::resource('/payment', 'PaymentController');
        Route::controller('/', 'ArticlesController');
    });
    Route::group(['domain' => 'blog.localhost'], function() {
        Route::controller('/', 'ArticlesController');
    });

    // 管理系
    Route::group(['domain' => 'admin.t-oda.tech'], function() {
        Route::auth();
        Route::post('/blog/search', 'BlogController@search');
        Route::resource('/blog', 'BlogController');
        Route::post('/payment/search', 'PaymentController@search');
        Route::resource('/payment', 'PaymentController');
        Route::get('/', function() {
            return redirect('login');
        });
    });

    // blog
    Route::group(['domain' => 'blog.t-oda.tech'], function() {
        Route::controller('/', 'ArticlesController');
    });

    // portfolio
    Route::resource('/', 'TestController');
    /*Route::get('/', function() {
        //return view('typed');
        abort(503);
        //return view('portfolio.index');
    });*/

});



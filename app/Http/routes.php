<?php
Route::group(['middleware' => 'web'], function () {
    // 管理系
    Route::group(['domain' => 'admin.localhost'], function () {
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
    Route::group(['domain' => 'blog.localhost'], function () {
        Route::resource('/article', 'ArticlesController', ['only' => ['index', 'show']]);
    });
    // ポートフォリオ
    Route::get('/', function () {
        return 'ポートフォリオ製作中';
    });


    // Route::group(['domain' => 'admin.localhost'], function() {
    //     Route::auth();
    //     Route::post('/blog/search', 'BlogController@search');
    //     Route::resource('/blog', 'BlogController');
    //     //Route::post('/payment/search', 'PaymentController@search');
    //     //Route::resource('/payment', 'PaymentController');
    //     //Route::controller('/', 'ArticlesController');
    // });
    // Route::group(['domain' => 'blog.localhost'], function() {
    //     Route::controller('/', 'ArticlesController');
    // })
    // 管理系
    /*Route::group(['domain' => 'admin.t-oda.tech'], function() {
        Route::auth();
        Route::post('/blog/search', 'BlogController@search');
        Route::resource('/blog', 'BlogController');
        Route::post('/payment/search', 'PaymentController@search');
        Route::resource('/payment', 'PaymentController');
        Route::get('/', function() {
            return redirect('login');
        });
    });*/

    // blog
/*    Route::group(['domain' => 'blog.t-oda.tech'], function() {
        Route::controller('/', 'ArticlesController');
    });*/

    // portfolio
    //Route::resource('/', 'TestController');
    // Route::get('/', function() {
    //     // $number = app('FixedRandomNumber');
    //     // dd($number);
    //     abort(503);
    //     //return view('typed');
    // });

    /*Route::get('/', function() {
        //return view('typed');
        abort(503);
        //return view('portfolio.index');
    });*/

});
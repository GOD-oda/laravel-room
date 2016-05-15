<?php

Route::group(['middleware' => 'web'], function () {
    /*Route::auth();
    Route::post('/blog/search', 'BlogController@search');
    Route::resource('/blog', 'BlogController');
    Route::post('/payment/search', 'PaymentController@search');
    Route::resource('/payment', 'PaymentController');
    Route::controller('/', 'ArticlesController');*/

    Route::group(['dmain' => 'admin.t-oda.tech'], function() {
        Route::auth();
        Route::post('/blog/search', 'BlogController@search');
        Route::resource('/blog', 'BlogController');
        Route::post('/payment/search', 'PaymentController@search');
        Route::resource('/payment', 'PaymentController');
    });

    // blog
    Route::group(['domain' => 'blog.t-oda.tech'], function() {
        Route::controller('/', 'ArticlesController');
    });

    // portfolio
    Route::get('/', function() {
        //return view('typed');
        abort(503);
        //return view('portfolio.index');
    });

});



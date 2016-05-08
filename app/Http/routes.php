<?php

Route::group(['middleware' => 'web'], function () {
    // blog
    /*Route::group(['domain' => 'blog.t-oda.tech'], function() {
        Route::auth();
        Route::resource('/admin', 'AdminController');
        Route::controller('/', 'ArticlesController');
    });*/

    // admin
    Route::group(['dmain' => 'admin.t-oda.tech'], function() {
        Route::auth();
        Route::resource('/blog', 'BlogController');
        Route::resource('/payment', 'PaymentController');
    });

    // blog
    Route::group(['domain' => 'blog.t-oda.tech'], function() {
        Route::controller('/', 'ArticlesController');
    });

    // portfolio
    Route::get('/', function() {
        abort(503);
        //return view('portfolio.index');
    });

});



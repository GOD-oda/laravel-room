<?php

Route::group(['middleware' => 'web'], function () {
    // blog
    /*Route::group(['domain' => 'blog.t-oda.tech'], function() {
        Route::auth();
        Route::resource('/admin', 'AdminController');
        Route::controller('/', 'ArticlesController');
    });*/

        Route::auth();
        Route::resource('/blog', 'BlogController');
        Route::resource('/payment', 'PaymentController');


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

    // tool
    Route::group(['domain' => 'tool.t-oda.tech'], function() {
        Route::get('/', function() {
            return 1;
        });
    });

    // portfolio
    Route::get('/', function() {
        abort(503);
        //return view('portfolio.index');
    });

});



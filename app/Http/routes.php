<?php

Route::group(['middleware' => 'web'], function () {
    // blog
    Route::group(['domain' => 'blog.t-oda.tech'], function() {
        Route::auth();
        Route::resource('/admin', 'AdminController');
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
        return view('portfolio.index');
    });

});



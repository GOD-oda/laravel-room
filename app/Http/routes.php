<?php

Route::group(['middleware' => 'web'], function () {
    // blog
    Route::group(['domain' => 'blog.t-oda.tech'], function() {
        Route::auth();
        Route::resource('/admin', 'AdminController');
        Route::controller('/', 'ArticlesController');
    });

    // portfolio
    Route::get('/', function() {
        return view('portfolio.index');
    });

});



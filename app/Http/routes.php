<?php

// interface SenderInterface
// {
//     public function send($message);
// }
// class MailSender implements SenderInterface
// {
//     public function __construct(BikeSender $bike)
//     {
//         $this->bike = $bike;
//     }
//     public function send($message)
//     {
//         return $message . " を送信しました";
//     }
// }
// class BikeSender
// {
//     public function byBike($message)
//     {
//         return "バイク便で " . $message . " を送信しました";
//     }
// }
// //$this->app->bind('sender', 'MailSender');
// $this->app->singleton('sender_single', 'MailSender');
// Route::get('send/{message?}', function($message='合格通知') {
//     $sender = $this->app->make('MailSender');
//     return $sender->bike->byBike($message);
//     return $sender->send($message);
// });
// Route::get('single', function() {
//     $single1 = $this->app->make('sender_single');
//     $single2 = $this->app->make('sender_single');
//     if ($single1 === $single2) {
//         return 'true';
//     }
//     return 'false';
// });

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::post('/blog/search', 'BlogController@search');
    Route::resource('blog', 'BlogController');
    Route::post('/payment/search', 'PaymentController@search');
    Route::resource('/payment', 'PaymentController');
    Route::controller('/', 'ArticlesController');

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
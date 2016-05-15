<?php
/*
class MessageDeliveryWithInterface
{
    protected $sender;
    public function __construct(Sender $sender)
    {
        $this->sender = $sender;
    }
    public function send($to, $message)
    {
        $this->sender->send($to, $message);
    }
    public function echoMessage($message)
    {
        $this->sender->echoMessage($message);
    }
}
interface Sender
{
    public function send($to, $message);
    public function echoMessage($message);
}
class MailSender implements Sender
{
    public function send($to, $message)
    {
        echo $to."<br>";
        echo $message."<br>";
    }
    public function echoMessage($message)
    {
        dd($message);
    }
}
class SmsSender implements Sender
{
    public function send($to, $message)
    {
        // send sms
    }
    public function echoMessage($message)
    {
        dd($message);
    }
}
app()->bind(Sender::class, function() {
    return new MailSender();
});
$delivery = app()->make(MessageDeliveryWithInterface::class);
$delivery->send('to', 'message');
$delivery->echoMessage('test');
exit;
*/
//Route::controller('/', 'TwilioController');

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::post('/blog/search', 'BlogController@search');
    Route::resource('/blog', 'BlogController');
    Route::post('/payment/search', 'PaymentController@search');
    Route::resource('/payment', 'PaymentController');
    Route::controller('/', 'ArticlesController');

    // 管理系
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

    // tool
    // 使う予定なし
    /*Route::group(['domain' => 'tool.t-oda.tech'], function() {
        Route::get('/', function() {
            return 1;
        });
    });*/

      // portfolio
    /*Route::get('/', function() {
        return view('typed');
        abort(503);
        //return view('portfolio.index');
    });*/

});



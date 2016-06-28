<?php
Route::group(['middleware' => 'web'], function () {
    // 管理
    Route::group(['prefix' => 'admin'], function () {
        Route::auth();
        Route::group(['middleware' => 'auth'], function () {
            Route::post('blog/search', 'Admin\BlogController@search');
            Route::resource('blog', 'Admin\BlogController');
            Route::post('payment/search', 'PaymentController@search');
            Route::resource('payment', 'PaymentController');
            Route::get('/', function () {
                return redirect('admin/blog');
            });
        });
    });
    // Route::get('youtube', function () {
    //     return view('youtube');
    // });
    //Route::get('twitter', function () {
        // $api_key = 'nPJRDyMPrYuUpRNr54jsfZMg6';
        // $api_secret = 'we08LswXV4CI5ny9FRULt7RNCMbkfG4vftAg8SLDaleQsVebbg';
        // $callback_url = 'localhost:8000/twitter';
        // $access_token_secret = '7fQLRtkaEJmofDjDVp6smknlQtGebKxVlHUNA2jAdyqX8';
        // $request_url = 'https://api.twitter.com/1.1/search/tweets.json';
        // $request_method = 'POST';
        // $signature_key = rawurlencode($api_secret).'&'.rawurlencode($access_token_secret);
        // $params = [
        //     'oauth_callback' => $callback_url,
        //     'oauth_consumer_key' => $api_key,
        //     'oauth_signature_method' => 'HMAC-SHA1',
        //     'oauth_timestamp' => time(),
        //     'oauth_nonce' => microtime(),
        //     'oauth_version' => '1.0',
        // ];
        // foreach ($params as $key => $value) {
        //     if ($key == 'oauth_callback') {
        //         continue;
        //     }
        //     $params[$key] = rawurlencode($value);
        // }
        // ksort($params);
        // $request_params = http_build_query($params, '', '&');
        // $request_params = rawurlencode($request_params);
        // $encoded_reqeust_method = rawurlencode($request_method);
        // $encoded_reqeust_url = rawurlencode($request_url);
        // $signature_data = $encoded_reqeust_method.$request_url.$request_params;

        // $hash = hash_hmac('sha1', $signature_data, $signature_key);
        // $signature = base64_encode($hash);

        // $pamaras['oauth_signature'] = $signature;
        // $header_params = http_build_query($params, '', '&');
        // $context = [
        //     'http' => [
        //         'method' => $request_method,
        //         'header' => [
        //             'Authorization: OAuth '.$header_params
        //         ]
        //     ]
        // ];
        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_URL, $request_url);
        // curl_setopt($curl, CURLOPT_HEADER, 1);
        // curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $context['http']['method']);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, $context['http']['header']);
        // curl_setopt($curl, CURLOPT_TIMEOUT, 5);
        // $res1 = curl_exec($curl);
        // $res2 = curl_getinfo($curl);
        // curl_close($curl);

        // $response = substr($res1, $res2['header_size']);
        // $header = substr($res1, 0, $res2['header_size']);

        //$user = \Socialite::driver('twitter')->user();
        //dd($user->getName());

        //dd($response);
    //});
    // Route::get('redirect', function () {
    //     return \Socialite::driver('twitter')->redirect();
    // });
    /**
     * ブログ
    */

    Route::get('contact', 'ContactController@index');
    Route::post('contact', 'ContactController@contact');
    Route::get('/{entry}', 'ArticlesController@show');
    Route::get('/', 'ArticlesController@index');
});
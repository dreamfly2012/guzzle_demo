<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'http://image.baidu.com/',
    // You can set any number of default request options.
    'timeout'  => 5.0,
]);


//$client = new \GuzzleHttp\Client(['cookies' => true]);

//$client->getHttpClient()->setDefaultOption('verify', 'C:/Windows/curl-ca-bundle.crt');

//$response = $client->request('GET', 'https://www.baidu.com/', ['cert'=>'D:\cacert.pem']);
//$response = $client->request('GET', 'https://www.baidu.com/');




$response = $client->request('POST', '/pictureup/uploadshitu', [
    'multipart' => [
        // [
        //     'name'     => 'foo',
        //     'contents' => 'data',
        //     'headers'  => ['X-Baz' => 'bar']
        // ],
        [
            'name'     => 'image',
            'contents' => fopen('1.jpg', 'r')
        ],
        // [
        //     'name'     => 'qux',
        //     'contents' => fopen('/path/to/file', 'r'),
        //     'filename' => 'custom_filename.txt'
        // ],
    ],
    //'allow_redirects' => false
]);

$url = "http://image.baidu.com/n/pc_search?queryImageUrl=http%3A%2F%2Fd.hiphotos.baidu.com%2Fimage%2Fpic%2Fitem%2F7e3e6709c93d70cf7836ed06f2dcd100bba12be8.jpg&querySign=1152263637%2C750309354&simid=20131210%2C11172285614364019700&fm=index&pos=upload&uptype=upload_pc";
$body = $response->getBody();

echo $response->getStatusCode();

$stringBody = (string) $body;
// Read 10 bytes from the body
$tenBytes = $body->read(10);

var_dump($stringBody);
$tenBytes = $body->read(10);
var_dump($body->getContents());

var_dump($response->getHeaders());


die;


//$response->getStatusCode();
var_dump($r->getHeaders()['Set-Cookie']);

die;

$response = $client->request('GET', 'test');

var_dump($response);

var_dump($response->headers['Set-Cookie']);



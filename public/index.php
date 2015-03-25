<?php
require '../vendor/autoload.php';
$app = new \Slim\Slim();


$app->get('/', function () {
    echo "Forward Unto Dawn";
});

$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

$app->post('/auth', function () {
    echo "instantiate controller here and pass the request object to it... ";
});


$app->run();
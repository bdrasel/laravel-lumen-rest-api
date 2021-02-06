<?php

/** @var \Laravel\Lumen\Routing\Router $router */



$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/register','RegisterController@OnRegister');
$router->post('/login','LoginController@onlogin');
// $router->post('/tokenTest',['middleware'=>'auth','uses'=>'LoginController@tokenTest']);



 $router->post('/insert',['middleware'=>'auth','uses'=>'PhoneBookController@insert']);
 $router->post('/select',['middleware'=>'auth','uses'=>'PhoneBookController@select']);
 $router->post('/delete',['middleware'=>'auth','uses'=>'PhoneBookController@delete']);

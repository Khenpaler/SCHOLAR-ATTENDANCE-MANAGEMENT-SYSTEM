<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('/notif',['uses' => 'NotifController@getNotif']);                          //get all users
$router->post('/notif',['uses' => 'NotifController@add']);                          //add  users
$router->get('/notif/{id}',['uses' => 'NotifController@show']);                     //get users by id
$router->put('/notif/{id}',['uses' => 'NotifController@updateUser']);          //UPDATE users by id
$router->delete('/notif/{id}',['uses' => 'NotifController@deleteUser']);           //delete user record

$router->get('/receipt',['uses' => 'ReceiptController@getReceipt']);                          //get all users
$router->post('/receipt',['uses' => 'ReceiptController@add']);                          //add  users
$router->get('/receipt/{id}',['uses' => 'ReceiptController@show']);                     //get users by id
$router->put('/receipt/{id}',['uses' => 'ReceiptController@updateUser']);          //UPDATE users by id
$router->delete('/receipt/{id}',['uses' => 'ReceiptController@deleteUser']);           //delete user record


$router->get('/sender',['uses' => 'SenderController@getSender']);                          //get all users
$router->post('/sender',['uses' => 'SenderController@add']);                          //add  users
$router->get('/sender/{id}',['uses' => 'SenderController@show']);                     //get users by id
$router->put('/sender/{id}',['uses' => 'SenderController@updateUser']);          //UPDATE users by id
$router->delete('/sender/{id}',['uses' => 'SenderController@deleteUser']);           //delete user record

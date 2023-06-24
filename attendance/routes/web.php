<?php

/** @var \Laravel\Lumen\Routing\Router $router */


$router->get('/', function () use ($router) {
    return $router->app->version();
});


//attendance routers
$router->post('attendance',['uses' => 'AttendanceController@add']); //1
$router->delete('attendance/{id}',['uses' => 'AttendanceController@delete']); //2
$router->put('attendance/{id}',['uses' => 'AttendanceController@updateAttendance']); //3
$router->get('attendance/{id}',['uses' => 'AttendanceController@show']); //4
$router->get('attendance',['uses' => 'AttendanceController@getAttendance']); //5

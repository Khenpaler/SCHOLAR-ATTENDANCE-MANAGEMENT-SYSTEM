<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// scholars table routes
$router->get('/scholars',['uses' => 'ScholarsController@getScholars']);                          
$router->post('/scholars',['uses' => 'ScholarsController@add']);                         
$router->get('/scholars/{id}',['uses' => 'ScholarsController@show']);                     
$router->put('scholars/{id}',['uses' => 'ScholarsController@updateScholars']);          
$router->delete('/scholars/{id}',['uses' => 'ScholarsController@delete']);          

// school table routes
$router->get('/school',['uses' => 'SchoolController@getSchool']);                          
$router->post('/school',['uses' => 'SchoolController@add']);                         
$router->get('/school/{id}',['uses' => 'SchoolController@show']);                     
$router->put('school/{id}',['uses' => 'SchoolController@updateSchool']);          
$router->delete('/school/{id}',['uses' => 'SchoolController@delete']);   

// courses table routes
$router->get('/courses',['uses' => 'CoursesController@getCourses']);                          
$router->post('/courses',['uses' => 'CoursesController@add']);                         
$router->get('/courses/{id}',['uses' => 'CoursesController@show']);                     
$router->put('/courses/{id}',['uses' => 'CoursesController@updateCourses']);          
$router->delete('/courses/{id}',['uses' => 'CoursesController@delete']);  


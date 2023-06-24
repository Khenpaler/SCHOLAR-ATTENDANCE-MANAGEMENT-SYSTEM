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

// event table routes
$router->get('/event',['uses' => 'EventController@getEvent']);                          
$router->post('/event',['uses' => 'EventController@add']);                         
$router->get('/event/{id}',['uses' => 'EventController@show']);                     
$router->put('event/{id}',['uses' => 'EventController@updateEvent']);          
$router->delete('/event/{id}',['uses' => 'EventController@delete']);          

// sponsors table routes
$router->get('/sponsors',['uses' => 'SponsorsController@getSponsors']);                          
$router->post('/sponsors',['uses' => 'SponsorsController@add']);                         
$router->get('/sponsors/{id}',['uses' => 'SponsorsController@show']);                     
$router->put('sponsors/{id}',['uses' => 'SponsorsController@updateSponsors']);          
$router->delete('/sponsors/{id}',['uses' => 'SponsorsController@delete']);   

// venue table routes
$router->get('/venue',['uses' => 'VenueController@getVenue']);                          
$router->post('/venue',['uses' => 'VenueController@add']);                         
$router->get('/venue/{id}',['uses' => 'VenueController@show']);                     
$router->put('venue/{id}',['uses' => 'VenueController@updateVenue']);          
$router->delete('/venue/{id}',['uses' => 'VenueController@delete']);  



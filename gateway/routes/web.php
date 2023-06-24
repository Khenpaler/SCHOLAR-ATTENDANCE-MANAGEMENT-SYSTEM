<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['middleware' => 'client.credentials'],function() use ($router) {

    // event table routes
    $router->get('/event',['uses' => 'EventController@getEvent']);                          
    $router->post('/event',['uses' => 'EventController@add']);                         
    $router->get('/event/{id}',['uses' => 'EventController@show']);                     
    $router->put('event/{id}',['uses' => 'EventController@update']);          
    $router->delete('/event/{id}',['uses' => 'EventController@delete']);          

    // sponsors table routes
    $router->get('/sponsors',['uses' => 'SponsorsController@getSponsors']);                          
    $router->post('/sponsors',['uses' => 'SponsorsController@add']);                         
    $router->get('/sponsors/{id}',['uses' => 'SponsorsController@show']);                     
    $router->put('sponsors/{id}',['uses' => 'SponsorsController@update']);          
    $router->delete('/sponsors/{id}',['uses' => 'SponsorsController@delete']);   

    // venue table routes
    $router->get('/venue',['uses' => 'VenueController@getVenue']);                          
    $router->post('/venue',['uses' => 'VenueController@add']);                         
    $router->get('/venue/{id}',['uses' => 'VenueController@show']);                     
    $router->put('venue/{id}',['uses' => 'VenueController@update']);          
    $router->delete('/venue/{id}',['uses' => 'VenueController@delete']);         

    // user table routes
    $router->get('/user',['uses' => 'UserController@getUser']);                          
    $router->post('/user',['uses' => 'UserController@add']);                         
    $router->get('/user/{id}',['uses' => 'UserController@show']);                     
    $router->put('user/{id}',['uses' => 'UserController@update']);          
    $router->delete('/user/{id}',['uses' => 'UserController@delete']);          

    // role table routes
    $router->get('/role',['uses' => 'RoleController@getRole']);                          
    $router->post('/role',['uses' => 'RoleController@add']);                         
    $router->get('/role/{id}',['uses' => 'RoleController@show']);                     
    $router->put('role/{id}',['uses' => 'RoleController@update']);          
    $router->delete('/role/{id}',['uses' => 'RoleController@delete']);   

    // notif table routes
    $router->get('/notif',['uses' => 'NotifController@getNotif']);                         
    $router->post('/notif',['uses' => 'NotifController@add']);                        
    $router->get('/notif/{id}',['uses' => 'NotifController@show']);                  
    $router->put('/notif/{id}',['uses' => 'NotifController@update']);          
    $router->delete('/notif/{id}',['uses' => 'NotifController@delete']);   

    // notif table receipt
    $router->get('/receipt',['uses' => 'ReceiptController@getReceipt']);                      
    $router->post('/receipt',['uses' => 'ReceiptController@add']);                      
    $router->get('/receipt/{id}',['uses' => 'ReceiptController@show']);                   
    $router->put('/receipt/{id}',['uses' => 'ReceiptController@update']);          
    $router->delete('/receipt/{id}',['uses' => 'ReceiptController@delete']);          

    // notif table sender
    $router->get('/sender',['uses' => 'SenderController@getSender']);                          
    $router->post('/sender',['uses' => 'SenderController@add']);                      
    $router->get('/sender/{id}',['uses' => 'SenderController@show']);                     
    $router->put('/sender/{id}',['uses' => 'SenderController@update']);          
    $router->delete('/sender/{id}',['uses' => 'SenderController@delete']);   
    
    // scholars table routes
    $router->get('/scholars',['uses' => 'ScholarsController@getScholars']);                          
    $router->post('/scholars',['uses' => 'ScholarsController@add']);                         
    $router->get('/scholars/{id}',['uses' => 'ScholarsController@show']);                     
    $router->put('scholars/{id}',['uses' => 'ScholarsController@update']);          
    $router->delete('/scholars/{id}',['uses' => 'ScholarsController@delete']);          

    // school table routes
    $router->get('/school',['uses' => 'SchoolController@getSchool']);                          
    $router->post('/school',['uses' => 'SchoolController@add']);                         
    $router->get('/school/{id}',['uses' => 'SchoolController@show']);                     
    $router->put('school/{id}',['uses' => 'SchoolController@update']);          
    $router->delete('/school/{id}',['uses' => 'SchoolController@delete']);   

    // courses table routes
    $router->get('/courses',['uses' => 'CoursesController@getCourses']);                          
    $router->post('/courses',['uses' => 'CoursesController@add']);                         
    $router->get('/courses/{id}',['uses' => 'CoursesController@show']);                     
    $router->put('/courses/{id}',['uses' => 'CoursesController@update']);          
    $router->delete('/courses/{id}',['uses' => 'CoursesController@delete']);


    //attendance table
    $router->post('attendance',['uses' => 'AttendanceController@add']); 
    $router->delete('attendance/{id}',['uses' => 'AttendanceController@delete']); 
    $router->put('attendance/{id}',['uses' => 'AttendanceController@update']); 
    $router->get('attendance/{id}',['uses' => 'AttendanceController@show']); 
    $router->get('attendance',['uses' => 'AttendanceController@getAttendance']); 



});


         


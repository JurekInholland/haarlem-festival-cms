<?php

$router->get("", "StaticController@index");
$router->get("admin", "AdminController@index");


$router->get("test", "StaticController@test");


$router->get("culture", "StaticController@culture");
$router->get("jazz", "StaticController@jazz");
$router->get("food", "StaticController@food");
$router->get("dance", "StaticController@dance");



// $router->post("eventSubmit", "AdminController@submit");
$router->post("eventSubmit", "EventController@submitEvent");




//////////////
$router->get("events", "EventController@index");
$router->get("event", "EventController@editEvent");
<?php

// Assign routes to controllers

/////////////// Index
$router->get("", "StaticController@index");

$router->get("test", "StaticController@test");

////////////// Content placeholders
$router->get("culture", "StaticController");

$router->get("jazz", "JazzController");


$router->get("food", "StaticController");
$router->get("dance", "StaticController");

////////////// CMS
$router->get("admin", "AdminController");


////////////// CMS Events
$router->get("events", "EventController@index");
$router->get("event", "EventController@editEvent");
$router->post("eventSubmit", "EventController@submitEvent");

$router->get("404", "StaticController@notFound");




////////////// Haarlem Jazz
// $router->get("test", "TestController@index");
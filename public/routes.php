<?php
/////////////// Index
$router->get("", "StaticController@index");

$router->get("test", "StaticController@test");

////////////// Content placeholders
$router->get("culture", "StaticController@culture");
$router->get("jazz", "StaticController@jazz");
$router->get("food", "StaticController@food");
$router->get("dance", "StaticController@dance");

////////////// CMS
$router->get("admin", "AdminController@index");
////////////// CMS Events
$router->get("events", "EventController@index");
$router->get("event", "EventController@editEvent");
$router->post("eventSubmit", "EventController@submitEvent");

$router->get("404", "StaticController@notFound");
////////////// Haarlem Jazz
// $router->get("test", "TestController@index");
<?php

$router->get("", "IndexController@index");
$router->get("admin", "AdminController@index");




$router->get("culture", "StaticController@culture");
$router->get("jazz", "StaticController@jazz");
$router->get("food", "StaticController@food");
$router->get("dance", "StaticController@dance");
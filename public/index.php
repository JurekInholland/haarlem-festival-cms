<?php

// Main entry point

require "../src/core/bootstrap.php";

$router = new Router($routes);
// require "routes.php";

// Load all defined routes
// $router = Router::load("routes.php");

// determine & require desired controller for route
// the uri is returned from Request after clean up


// $router->direct(Request::uri(), Request::method());

$router->newDirect(Request::uriComponents(), Request::method());

return;
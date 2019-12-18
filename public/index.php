<?php

// Main entry point

require "../src/core/bootstrap.php";

$router = new Router($routes);

$router->direct(Request::uriComponents(), Request::method());

return;
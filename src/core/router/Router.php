<?php
class Router {

    // Register routes specifically for GET or POST requests
    protected $routes = [
        "GET" => [],
        "POST" => []
    ];

    public function __construct($routes)
    {
        $this->routes = $routes;
    }


    // Assign GET requests
    public function get(string $uri, string $controller) {
        $this->routes["GET"][$uri] = $controller;
    }
    // Assign POST requests
    public function post(string $uri, string $controller) {
        $this->routes["POST"][$uri] = $controller;
    }


    public function direct(array $uriComponents, string $requestType) {

        // Fixed url scheme: example: domain.nl/controller/method/parameter
        // Uri components contain controller, method and an optional parameter

        // Check for matching controller
        if (array_key_exists($uriComponents[0], $this->routes[$requestType])) {
            
            // Default values
            $controller = "StaticController";
            $method = "index";
            $parameter = "";

            // Set Controller based on first part of uri components
            if ($uriComponents[0] != "") {
                $controller = $this->routes[$requestType][$uriComponents[0]];
            }

            // Set method based on second part of uri components
            if (isset($uriComponents[1])) {
                $method = $uriComponents[1];
            }

            // Set parameter based on third part of uri components
            if (isset($uriComponents[2])) {
                $parameter = $uriComponents[2];
            }

            // Call method of Controller, if exists and is public
            if (is_callable(array($controller, $method))) {
                try {
        
                    // Avoid calling the view method of the base Controller class
                    if (strtolower($method) != "view") {
                        $this->callMethod($controller, $method, $parameter);
                        return;
                    }

                
                // If NotAuthorized exception is thrown in Controller constructor,
                // display not authorized page
                } catch (NotAuthorized $e) {
                    return StaticController::notAuthorized();
                }
            }
        }
        // If no matching controller + method were found, show 404 page
        return StaticController::index();
    }


    // Call given method of given controller passing given parameter
    protected function callMethod($controller, $method, $parameter="") {
        $controller = new $controller;
        return $controller->$method($parameter);
       
    }
}
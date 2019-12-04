<?php
class Router {

    // Register routes specifically for GET or POST requests
    protected $routes = [
        "GET" => [],
        "POST" => []
    ];

    // Handle GET requests
    public function get(string $uri, string $controller) {
        $this->routes["GET"][$uri] = $controller;
    }
    // Handle POST requests
    public function post(string $uri, string $controller) {
        $this->routes["POST"][$uri] = $controller;
    }

    public static function load(string $file) {
        
        // Create an instance of Router within static method
        $router = new static;

        // Require the given file
        require $file;

        // Return the created instance of Router
        return $router;
    }


    // If a route matches a given uri, load the respective controller
    public function direct(string $uri, string $requestType) {
        
        // Check if the given uri is a key in the requestType (GET or POST) array of routes
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callMethod(
                // splat operator (...) to turn array into function arguments
                // explode splits request at @
                ...explode("@", $this->routes[$requestType][$uri])
            );
        }
        // Throw exception if no route was found
        return StaticController::notFound();
        throw new Exception("Router direct error");

    }

    
    // Call given method of given controller
    protected function callMethod($controller, $method) {
        $controller = new $controller;
        if (method_exists($controller, $method)) {
            
            // Return a controller instance and call indicated method
            return $controller->$method();
        } else {
            throw new Exception("Controller doesnt contain method");
        }
    }
}
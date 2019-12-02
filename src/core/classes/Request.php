<?php
// Fetch information about a browser request
class Request {
    
    // Return a request's uri
    public static function uri() {
        $uri = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        $uriArray = explode('/', $uri);
        return $uriArray[0];
    }
    
    
    // Return a request's method (get, post..)
    public static function method() {
        return $_SERVER["REQUEST_METHOD"]; 
    }

    // Return uri parameters after the first /
    public static function uriParams() {
        $uri = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        $uriArray = explode('/', $uri);
        array_shift($uriArray);
        return $uriArray;
    }
}

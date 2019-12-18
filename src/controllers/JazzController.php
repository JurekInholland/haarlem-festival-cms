<?php

class JazzController extends Controller {
    
    
    public static function index() {
        return self::view("placeholder", ["headline" => "Jazz", "content" => "jazz content..."]);
    }


    // /jazz/example
    public static function example() {
        $events = JazzService::getAll();
        var_dump($events);

    }
}
<?php

class DanceController extends Controller {
    
    
    public static function index() {
        return self::view("placeholder", ["headline" => "Dance", "content" => "dance content..."]);
    }
}
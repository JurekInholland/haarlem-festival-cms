<?php

class FoodController extends Controller {
    
    
    public static function index() {
        return self::view("placeholder", ["headline" => "Food", "content" => "food content..."]);
    }
}
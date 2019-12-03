<?php

abstract class TestController extends Controller {
    public static function index() {
        $testVariable = "hello";
        return self::view("test/index", ["testvar" => $testVariable]);
    }

    public static function render(string $viewName, array $data = [])
    {
        
    }
}
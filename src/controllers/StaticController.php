<?php

// Controller for static pages like contact, about etc. as well as placeholders
// during development


class StaticController extends Controller {


    protected static function head() {
        return "head";
    }

    public function index() {

        return $this->view("homepage/index");
        // return $this->view("placeholder", ["headline" => "Homepage", "content" => "index content..."]);
    }

    public function culture() {
        return $this->view("placeholder", ["headline" => "Culture", "content" => "culture content..."]);
    }

    public function jazz() {
        return $this->view("placeholder", ["headline" => "Jazz", "content" => "jazz content..."]);
    }

    public function food() {
        return $this->view("placeholder", ["headline" => "Food", "content" => "food content..."]);
    }

    public function dance() {
        return $this->view("placeholder", ["headline" => "Dance", "content" => "dance content..."]);
    }


    public function test() {
        // self::testView();

        return self::view("partials/table");
    }

    public static function notFound() {
        return self::view("placeholder", ["headline" => "404", "content" => "page not found"]);
    }


    

}
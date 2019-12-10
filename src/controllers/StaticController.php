<?php

// Controller for static pages like contact, about etc. as well as placeholders
// during development


class StaticController extends Controller {


    protected static function head() {
        return "head";
    }

    public function index() {
        switch (Request::uri()) {
            case "":
                return $this->view("homepage/index");

            case "parking":
                echo "Parking";
                break;
            
            case "house-rules":
                echo "House rules";
                break;
            
            case "faq":
                echo "faq";
                break;

        }
    }

    public static function notFound() {
        return self::view("404");
    }


    

}
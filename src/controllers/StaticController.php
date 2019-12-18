<?php

// Controller for static pages like contact, about etc. as well as placeholders
// during development

class StaticController extends Controller {

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
            
            case "test":
                $eventInfo = [
                    "title" =>"title",
                    "description" => "desc", 
                    "category" => "cat", 
                ];

                $res = "'".implode("', '", array_keys($eventInfo))."'";


                // $res = App::get("db")->arrayKeysToList($eventInfo);
        }
    }

    public static function notFound() {
        return self::view("404");
    }


    

}
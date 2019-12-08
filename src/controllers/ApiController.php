<?php

class ApiController {
    
    // Work in progress

    public function index() {
        echo "API INDEX";
    }

    public function locations() {
        
        $test = [
            "entry1" => [
                "prop1" => "1",
                "prop2" => "2"
            ],

            "entry1" => [
                "prop1" => "1",
                "prop2" => "2"
            ],
        ];

        $locations = App::get("festival")->getLocations();
        self::serveJson((array)$locations);
    }


    private static function serveJson(array $jsonData) {
        header('Content-type: application/json');
        echo json_encode($jsonData, JSON_PRETTY_PRINT);
    }
} 
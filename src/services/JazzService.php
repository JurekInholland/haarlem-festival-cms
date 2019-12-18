<?php

class JazzService {


    // Get all 
    public static function getAll() {

        $sql = "SELECT * FROM events WHERE category = :category";
        $params = [":category" => "0"];

        $events = App::get("db")->query($sql, $params);

        $models = [];

        foreach ($events as $event) {
            // $jazzEvent = new JazzModel($event);
        }

        return $events;
    }
}
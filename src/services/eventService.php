<?php

class eventService {

    // Return an Event based on user input post data 
    public static function fromPost() {

    }

    public static function fromSelect() {}


    public static function getAll() {
        $params = [
            "select" => ["*"],
            "from" => "new_events",
            "orderBy" => "start_date"
        ];

        $events = App::get("db")->select($params);
        $eventList = [];

        foreach ($events as $value) {
            $event = new GeneralEvent($value);
            array_push($eventList, $event);
        }
        return $eventList;
    }

    public static function fromSlug($slug) {

        $params = [
            "select" => ["*"],
            "from" => "new_events",
            "where" => "slug",
            "operator" => "LIKE",
            "target" => $slug
        ];

        $res = App::get("db")->select($params);
        
        // die(var_dump($res));
        if (array_key_exists(0, $res)) {
            $event = new GeneralEvent($res[0]);

        } else {
            $event = new GeneralEvent([]);
        }

        return $event;
    }
}
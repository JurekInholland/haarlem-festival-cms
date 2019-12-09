<?php

class EventService {

    // Return an Event based on user input post data 
    public static function fromPost($post) {

        // $location = new EventLocation($post)

        $eventData = [
            "artist" => $post["artist"],
            "description" => $post["description"],
            "category" => $post["category"],
            "startDate" => self::parseDate($post["day"], $post["start_time"]),
            "endDate" => self::parseDate($post["day"], $post["end_time"]),
            "price" => self::parsePrice($post["price"]),
            "location" => $post["location"], 
        ];

        $event =  new GeneralEvent($eventData);
        return $event;
    }

    private static function parsePrice(string $priceStr) {
        $price = str_replace("€", "", $priceStr);
        return floatval($price);
    } 

    private static function parseDate(string $dateIndex, string $timeStr) {
        $days = App::get("festival")->festivalDays();
        $date = $days[$dateIndex]["date"];

        $time = explode(":", $timeStr);
        $date->setTime((int)$time[0], (int)$time[1]);
        return $date;
    }



    public static function fromSelect() {}


    public static function getAll() {
        $params = [
            "select" => ["*"],
            "from" => "new_events",
            "orderBy" => "startDate"
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


    public static function store(GeneralEvent $event) {
        $eventInfo = [
            "title" => $event->title,
            "description" => $event->description, 
            "category" => $event->category, 
            "start_time" => $event->start_time, 
            "end_time" => $event->end_time, 
            "price" => $event->price, 
            "location" => $event->location, 
            "slug" => $event->slug, 
        ];
        App::get("db")->insertUpdate("events", $eventInfo);
    }
}
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

        $sql = "SELECT * FROM events ORDER BY id";
        $events = App::get("db")->query($sql);

        $eventList = [];

        foreach ($events as $value) {
            $event = new GeneralEvent($value);
            array_push($eventList, $event);
        }
        return $eventList;
    }

    public static function fromSlug($slug) {


        $sql = "SELECT * FROM events WHERE slug LIKE :slug";
        $para = [":slug" => $slug];
        $res = App::get("db")->query($sql, $para);

        
        if (array_key_exists(0, $res)) {
            $event = new GeneralEvent($res[0]);

        } else {
            $event = new GeneralEvent([]);
        }

        return $event;
    }


    public static function store(GeneralEvent $event) {
        $eventInfo = [
            "artist" => $event->artist,
            "description" => $event->description, 
            "category" => $event->category, 
            "startDate" => $event->startDate->format("Y-m-d H:i:s"), 
            "endDate" => $event->endDate->format("Y-m-d H:i:s"), 
            "price" => $event->price, 
            "location" => $event->location, 
            "slug" => $event->slug, 
        ];
        App::get("db")->insertUpdate("new_events", $eventInfo);
    }
}
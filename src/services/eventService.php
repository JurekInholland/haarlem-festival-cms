<?php

class EventService {

    // Return an Event based on user input post data
    // TODO: Refactor
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

    public static function getRestaurants() {
        $sql = "SELECT * FROM festival_events WHERE type = 2";
        $restaurants = App::get("db")->query($sql);

    }

    // TODO: Implement
    public function countByType() {
        $sql = "SELECT type, COUNT(type) FROM festival_events GROUP BY type";

    }

    public static function fromSelect() {}

    // TODO: rename
    public static function getAll() {
    
        $sql = "SELECT * FROM festival_events ORDER BY slug";
        $events = App::get("db")->query($sql);

        $eventList = [];

        foreach ($events as $eventdata) {
            $event = new FestivalEvent($eventdata);
            array_push($eventList, $event);
        }
        return $eventList;
    }

    public static function fromSlug($slug) {


        $sql = "SELECT * FROM festival_events WHERE slug LIKE :slug";
        $para = [":slug" => $slug];
        $res = App::get("db")->query($sql, $para);

        
        if (array_key_exists(0, $res)) {
            $event = new FestivalEvent($res[0]);

        } else {
            $event = new FestivalEvent([]);
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
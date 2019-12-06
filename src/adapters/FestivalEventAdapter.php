<?php

// Adapter to create FestivalEvents either from form or from database information
class FestivalEventAdapter {

    
    // Takes event information from forms and returns a FestivalEvent model
    public static function fromForms(array $post) {
        
        $dates = self::parseDates($post);
        $price = self::parsePrice($post);

        $eventData = [
            "title" => $post["title"],
            "description" => $post["description"],
            "category" => $post["category"],
            "start_time" => $dates["start"],
            "end_time" => $dates["end"],
            "price" => $price,
            "location" => $post["location"], 
        ];

        $event =  new FestivalEvent($eventData);
        return $event;
    }

    // public static function fromDb(array $eventInfo) {
    //     $event = new FestivalEvent($eventInfo);
    //     return $event;
    // }

    public static function fromSlug($slug) {

        $params = [
            "select" => ["*"],
            "from" => "events",
            "where" => "slug",
            "operator" => "LIKE",
            "target" => $slug
        ];

        $res = App::get("db")->select($params);
        
        // die(var_dump($res));
        if (array_key_exists(0, $res)) {
            $event = new FestivalEvent($res[0]);

        } else {
            $event = new FestivalEvent([]);
        }

        return $event;
    }

    private static function parseDates(array $post) {
        $days = FestivalEventAdapter::festivalDays();

        $startDate = new DateTime($days[$post["day"]]["date"]->format("Y-m-d"));
        $endDate = new DateTime($days[$post["day"]]["date"]->format("Y-m-d"));

        $startTime = explode(":", $post["start_time"]);
        $endTime = explode(":", $post["end_time"]);

        $startDate->setTime($startTime[0], $startTime[1]);
        $endDate->setTime($endTime[0], $endTime[1]);

        return [
            "start" => $startDate->format("Y-m-d H:i:s"),
            "end" => $endDate->format("Y-m-d H:i:s")
        ];

    }
    

    private function parsePrice(array $post) {
        $price = str_replace("€", "", $post["price"]);
        return floatval($price);
    }


}
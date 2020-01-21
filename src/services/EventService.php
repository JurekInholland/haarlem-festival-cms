<?php

class EventService {

    // Return an Event based on user input post data
    // TODO: Refactor



    public static function fromPost($post) {
        // die(var_dump($post));
        switch ($post["type"]) {
            case 0:
                $startDate = self::parseDay($post["day"], $post["start_time"]);
                $endDate = self::parseDay($post["day"], $post["end_time"]);
                $slug = self::createSlug("{$post["name"]} at {$post["address"]}");
                $rating = "";
            break;
            case 1:
                $startDate = self::parseDay($post["day"], $post["start_time"]);
                $endDate = self::parseDuration($startDate, $post["duration"]);
                $slug = self::createSlug("{$post["name"]} at {$post["address"]}");
                $rating = "";    
            break;
            case 2:
                $startDate = self::parseDay("0", $post["first_session"]);
                $endDate = self::parseSession($startDate, (int)$post["location"], $post["session_duration"]);
                $slug = self::createSlug("{$post["name"]}");
                $rating = $post["rating"];
                break;
        }
        // die(var_dump($endDate));

        $eventData = [
            "id" => $post["event_id"],
            "type" => $post["type"],
            "start_date" => $startDate,
            "end_date" => $endDate,

            "address" => $post["address"],
            "location_detail" => $post["location"],
            "name" => $post["name"],
            "tickets" => $post["seats"],
            "price" => self::parsePrice($post["price"]),
            "description" => $post["description"],
            "rating" => $rating,
            "slug" => $slug
        ];

        return new FestivalEvent($eventData);
    }

    // Dev method
    public function generateSlugs() {
        $events = self::getAll();
        foreach ($events as $event) {
            $slug = "";
            switch ($event->getType()) {
                case 0:
                    $slug = self::createSlug("{$event->getName()} at {$event->getAddress()}");
                    break;
    
                case 1:
                    $slug = self::createSlug("{$event->getName()} at {$event->getAddress()}");
                    break;
    
                case 2:
                    $slug = self::createSlug("{$event->getName()}");
                    break;
            }
                        
            $event->setSlug($slug);
            self::update($event);
        }
    }

    private static function createSlug($str, $delimiter = '-'){
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }

    private static function parsePrice(string $priceStr) {
        $price = str_replace("€", "", $priceStr);
        return floatval($price);
    } 

    private static function parseSession(DateTime $startDate, int $sessionCount, string $sessionDuration) {
        list($hours, $minutes) = explode(":", $sessionDuration);
        $minutes += $hours*60;
        // $seconds = $minutes*60;

        $duration = $minutes * $sessionCount;
        $startDate->modify("+{$duration} minutes");
        return $startDate;
        // date_default_timezone_set ("UTC"); // makes sure there is no DST or timezone added to result
        // $session_duration = date("h:i", $seconds * $sessionCount);

    }

    // calculate an end date based on start datetime and duration in minutes
    private static function parseDuration(DateTime $startDate, string $duration) {
        list($hours, $minutes) = explode(":", $duration);
        $minutes += $hours*60;
        
        $startDate->modify("+{$minutes} minutes");
        return $startDate;
    }

    // Get date object based on festival day index and time as str
    private static function parseDay(string $dateIndex, string $timeStr) {
        date_default_timezone_set ("UTC"); // makes sure there is no DST or timezone added to result

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

    public static function getById(string $eventId) {
        $sql = "SELECT * FROM festival_events WHERE `id`=:id";
        $params = [":id" => $eventId];
        $data = App::get("db")->query($sql, $params);
        if (isset($data[0])) {
            $event = new FestivalEvent($data[0]);
        } else {
            $event = new FestivalEvent([]);
        }
        return $event;

    } 

    public static function getByType(string $type) {

        $sql = "SELECT * FROM festival_events
        WHERE type=:type
        ORDER BY start_date, name";
        $params = [":type" => $type];
        $events = App::get("db")->query($sql, $params);

        $eventList = [];

        foreach ($events as $eventdata) {
            $event = new FestivalEvent($eventdata);
            array_push($eventList, $event);
        }
        return $eventList;
    }

    public static function getAll() {
    
        $sql = "SELECT * FROM festival_events ORDER BY start_date, name";
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

    public static function deleteEvent(string $eventId) {
        $sql = "DELETE from festival_events
        WHERE id=:id";

        $params = [":id" => $eventId];
        App::get("db")->query($sql, $params);
    }

    public static function update(FestivalEvent $event) {

        if (! is_string($event->getStartDate())) {
            $startdate = $event->getStartDate()->format("Y-m-d H:i:s");
            $enddate = $event->getEndDate()->format("Y-m-d H:i:s");
        } else {
            $startdate = $event->getStartDate();
            $enddate = $event->getEndDate();
        }

        $sql = "UPDATE festival_events SET type=:type, name=:name, address=:address, tickets=:tickets, rating=:rating, description=:description, start_date=:start_date,
        end_date=:end_date, price=:price, location_detail=:location_detail, slug=:slug
        WHERE id=:id";
        $params = [
            ":id" => $event->getId(),
            ":type" => $event->getType(),
            ":name" => $event->getName(),
            ":address" => $event->getAddress(),
            ":tickets" => $event->getNumberTickets(),
            ":rating" => $event->getRating(),
            ":description" => $event->getDescription(), 
            ":start_date" => $startdate, 
            ":end_date" => $enddate, 
            ":price" => $event->getPrice(), 
            ":location_detail" => $event->getLocation(), 
            ":slug" => $event->getSlug(), 
        ];
        App::get("db")->query($sql, $params);
        
    }

    public static function Oupdate(FestivalEvent $event) {
        $sql = "INSERT INTO festival_events (`type`, `name`, `address`, `tickets`, `rating`, `description`, `start_date`,
                end_date, price, location_detail, slug) VALUES (:type, :name, :address, :tickets, :rating, :description, :start_date,
                :end_date, :price, :location_detail, :slug)
                WHERE festival_events.id=:id
                ON DUPLICATE KEY UPDATE
                `type`=VALUES(type), `name`=VALUES(`name`), `address`=VALUES(`address`), tickets=VALUES(tickets), rating=VALUES(rating), 
                `description`=VALUES(`description`), `start_date`=VALUES(`start_date`), end_date=VALUES(end_date), price=VALUES(price),
                location_detail=VALUES(location_detail), slug=VALUES(slug)";

        $params = [
            ":id" => $event->getId(),
            ":type" => $event->getType(),
            ":name" => $event->getName(),
            ":address" => $event->getAddress(),
            ":tickets" => $event->getNumberTickets(),
            ":rating" => $event->getRating(),
            ":description" => $event->getDescription(), 
            ":start_date" => $event->getStartDate()->format("Y-m-d H:i:s"), 
            ":end_date" => $event->getEndDate()->format("Y-m-d H:i:s"), 
            ":price" => $event->getPrice(), 
            ":location_detail" => $event->getLocation(), 
            ":slug" => $event->getSlug(), 
        ];

        App::get("db")->query($sql, $params);
    }

    public static function store(FestivalEvent $event) {
        $eventInfo = [
            "type" => $event->getType(),
            "name" => $event->getName(),
            "address" => $event->getAddress(),
            "tickets" => $event->getNumberTickets(),
            "rating" => $event->getRating(),
            "description" => $event->getDescription(), 
            "start_date" => $event->getStartDate()->format("Y-m-d H:i:s"), 
            "end_date" => $event->getEndDate()->format("Y-m-d H:i:s"), 
            "price" => $event->getPrice(), 
            "location_detail" => $event->getLocation(), 
            "slug" => $event->getSlug(), 
        ];
        App::get("db")->insertUpdate("festival_events", $eventInfo);
    }
}
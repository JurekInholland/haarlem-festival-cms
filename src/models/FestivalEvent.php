<?php

class FestivalEvent {

    protected $title;
    protected $description;
    protected $category;
    protected $start_time;
    protected $end_time;
    protected $price;
    protected $location;
    protected $slug;


    protected $eventData;

    public function __construct($eventData)
    {
        // $this->eventData = $eventData;

        $this->title = $eventData["title"];
        $this->description = $eventData["description"];
        $this->category = $eventData["category"];
        $this->start_time = $eventData["start_time"];
        $this->end_time = $eventData["end_time"];
        $this->price = $eventData["price"];
        $this->location = $eventData["location"];
        $this->slug = $this->createSlug($eventData["title"]);
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDate() {
        $date = new DateTime($this->start_time);
        return $date->format('d.m.Y');
    }

    public function getDateString() {
        $date = new DateTime($this->start_time);
        return "{$date->format('l')}, {$date->format('d.m.Y')}";
    }

    public function getDayId() {
        $days = $this->festivalDays();
        $date = new DateTime($this->start_time);

        foreach ($days as $key => $value) {
            die(var_dump($date));
            var_dump($value["date"]);
            if ($date === $value["date"]) {
                echo "return " . $key;
                
                return $key;
            }
        }
    }

    public function getStartTime() {
        $date = new DateTime($this->start_time);
        return $date->format('H:i');
    }

    public function getEndTime() {
        $date = new DateTime($this->end_time);
        return $date->format('H:i');
    }

    public function getLocation() {

        $locations = App::get("festival")["location"];
        return $locations[$this->location];
    }

    public function getLocationId() {
        return $this->location;
    }

    public function getCategory() {
        $types = App::get("festival")["event_type"];
        return $types[$this->category];
    }

    public function getCategoryId() {
        return $this->category;
    }
    public function getPrice() {
        return $this->price;
    }

    public function getColor() {
        $colors = App::get("festival")["color"];
        return $colors[$this->category];
    }

    public function getSlug() {
        return $this->slug;
    }
    // Return an array of days of dates on which the festival takes place as well as
    // strings in human readable format

    // TODO move to festival model DELETE
    public function festivalDays() {
        
        // Get start and end date from festival config
        $info = App::get("festival");
        
        $start = new DateTime($info["start_date"]);
        $end = new DateTime($info["end_date"]);
        
        // A bit of a hack: Set the time > zero to also include the last day..
        $end->setTime(0,0,1); 

        // iterable DatePeriod
        $period = new DatePeriod(
            $start,
            new DateInterval('P1D'),
            $end
        );

        $result = [];

        foreach ($period as $idx => $date) {

            $string = "{$date->format('l')}, {$date->format('d.m.Y')}";

            $result[$idx] = [
                "string" => $string,
                "date" => $date
            ];        
        }

        return $result;
    }

    
    public function storeSelf() {

        $eventInfo = [
            "title" => $this->title,
            "description" => $this->description, 
            "category" => $this->category, 
            "start_time" => $this->start_time, 
            "end_time" => $this->end_time, 
            "price" => $this->price, 
            "location" => $this->location, 
            "slug" => $this->slug, 
        ];

        App::get("db")->insertUpdate("events", $eventInfo);
    }

    // public static function getSlug() {
    //     return $this->createSlug($this->title);
    // }

    private static function createSlug($str, $delimiter = '-'){

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }

    private function getDaysfromDates(DatePeriod $period) {
        
        $result = [];

        foreach ($period as $date) {
            array_push($result, "{$date->format('l')}, {$date->format('d.m.Y')}");
        }
        return $result;
    }
}